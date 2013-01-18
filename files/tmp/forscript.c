#define _XOPEN_SOURCE 500
#define _POSIX_C_SOURCE 200112L
#define UNUSED(var) while (0) { (void)(var); }
#include <time.h>
#include <arpa/inet.h>
#include <string.h>
#include <sys/ioctl.h>
#include <locale.h>
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <sys/types.h>
#include <sys/stat.h>
#include <fcntl.h>
#include <termios.h>
#include <signal.h>
#include <sys/select.h>
#include <sys/wait.h>

const unsigned char SO  = 0x0e;
const unsigned char SI  = 0x0f;
const unsigned char DLE = 0x10;
const unsigned char ESCMIN = 0x0e;
const unsigned char ESCMAX = 0x10;
const char *STARTMSG = "forscript started on %s, file is %s\r\n";
const char *STOPMSG = "forscript done on %s, file is %s\r\n";

FILE *OUTF;
char *MYNAME;
const char *MYVERSION = "0.9-git";
int aflg = 0, fflg = 0, qflg = 0;
char *cflg = NULL;
char *OUTN = "transcript";
int PTM = 0, PTS = 0;
struct termios TT;
int CHILD = 0;

void die(char *message, int chunk) {
        fprintf(stderr, "%s: ", MYNAME);
        if (chunk != 0) {
                fprintf(stderr, "metadata chunk %02x failed", chunk);
                if (message != NULL)
                        fprintf(stderr, ": ");
        } else {
                if (message == NULL)
                        fprintf(stderr, "unknown error");
        }
        if (message != NULL)
                fprintf(stderr, message);
        fprintf(stderr, "; exiting.\n");
        exit(EXIT_FAILURE);
}

int swrite(const void *ptr, size_t size, size_t nmemb, FILE *stream) {
        return (fwrite(ptr, size, nmemb, stream) == nmemb);
}

int chunkwd(unsigned char *data, int count) {
        int escaped = 0;
        int pos = 0;
        int start = 0;
        while (pos < count) {
                if (data[pos] <= ESCMAX && data[pos] >= ESCMIN) {
                        if (pos > start) {
                                if (!swrite(&data[start], sizeof(char), pos - start, OUTF))
                                        return -1;
                        }
                        if (!swrite(&DLE, sizeof(DLE), 1, OUTF))
                                return -2;
                        start = pos;
                        escaped++;
                }
                pos++;
        }
        if (!swrite(&data[start], sizeof(char), pos - start, OUTF))
                return -3;
        return escaped;
}

int chunkwh(unsigned char id) {
        int ret;
        for (int i = 0; i < 2; i++) {
                ret = swrite(&SO, sizeof(SO), 1, OUTF);
                if (!ret)
                        return -1;
        }
        return (swrite(&id, sizeof(unsigned char), 1, OUTF)) ? 1 : -1;
}

int chunkwf() {
        return (swrite(&SI, sizeof(SI), 1, OUTF)) ? 1 : -1;
}

int chunkwm(unsigned char id, unsigned char *data, int count) {
        int ret;
        if (!chunkwh(id))
                return -11;
        if ((ret = chunkwd(data, count)) < 0)
                return ret;
        if (!chunkwf())
                return -12;
        return 1;
}

int chunk01() {
        unsigned char ver = 0x01;
        return chunkwm(0x01, &ver, sizeof(ver));
}
int chunk02() {
        struct timespec now;
        extern long timezone;
        int ret;
        unsigned char data[10];
        uint32_t secs;
        int32_t nanos = ~0;
        int16_t tzone = ~0;
        if ((ret = clock_gettime(CLOCK_REALTIME, &now)) < 0)
                return ret;
        secs = htonl(now.tv_sec);
        if (now.tv_nsec < 2000000000L && now.tv_nsec > -2000000000L)
                nanos = htonl(now.tv_nsec);
        tzset();
        tzone = htons((uint16_t)(timezone / -60));
        memcpy(&data[0], &secs, sizeof(secs));
        memcpy(&data[4], &nanos, sizeof(nanos));
        memcpy(&data[8], &tzone, sizeof(tzone));
        return chunkwm(0x02, data, sizeof(data));
}
int chunk03(int status) {
        unsigned char data = ~0;
        if (WIFEXITED(status))
                data = WEXITSTATUS(status);
        else if (WIFSIGNALED(status))
                data = 128 + WTERMSIG(status);
        return chunkwm(0x03, &data, sizeof(data));
}
int chunk11(struct winsize *size) {
        uint32_t be;
        be = htonl((size->ws_col << 16) | size->ws_row);
        return chunkwm(0x11, (unsigned char *)&be, sizeof(be));
}
int chunk12() {
        extern char **environ;
        int i = 0;
        int ret;
        while (environ[i] != NULL) {
                if (i == 0) {
                        if ((ret = chunkwh(0x12)) < 0)
                                return ret;
                }
                if ((ret = chunkwd((unsigned char *)environ[i],
                                   strlen(environ[i]) + 1)) < 0)
                        return ret;
                i++;
        }
        if (i != 0) {
                if ((ret = chunkwf()) < 0)
                        return ret;
        }
        return 1;
}
int chunk13() {
        int cat[7] = { LC_ALL, LC_COLLATE, LC_CTYPE, LC_MESSAGES,
                       LC_MONETARY, LC_NUMERIC, LC_TIME };
        char *loc;
        int ret;
        if ((ret = chunkwh(0x13)) < 0)
                return ret;
        for (int i = 0; i < 7; i++) {
                if ((loc = setlocale(cat[i], "")) == NULL)
                        return -1;
                if ((ret = chunkwd((unsigned char *)loc, strlen(loc) + 1)) < 0)
                        return ret;
        }
        if ((ret = chunkwf()) < 0)
                return ret;
        return 0;
}
int chunk16(struct timespec *ts) {
        unsigned char buf[2 * sizeof(uint32_t)];
        uint32_t secs, nanos;
        struct timespec now;
        if (clock_gettime(CLOCK_MONOTONIC, &now) < 0)
                return -1;
        secs = now.tv_sec - ts->tv_sec;
        if (now.tv_nsec > ts->tv_nsec) {
                nanos = now.tv_nsec - ts->tv_nsec;
        } else {
                nanos = 1000000000L - (ts->tv_nsec - now.tv_nsec);
                secs--;
        }
        *ts = now;
        secs = htonl(secs);
        nanos = htonl(nanos);
        memcpy(&buf[0], &secs, sizeof(secs));
        memcpy(&buf[sizeof(secs)], &nanos, sizeof(nanos));
        return chunkwm(0x16, buf, sizeof(buf));
}
#define chunk(num) if (chunk##num() < 0) die(NULL, 0x##num);

void statusmsg(const char *msg) {
        char date[BUFSIZ];
        time_t t = time(NULL);
        struct tm *lt = localtime(&t);
        if (lt == NULL)
                die("localtime failed", 0);
        if (strftime(date, sizeof(date), "%c", lt) < 1)
                die("strftime failed", 0);
        if (printf(msg, date, OUTN) < 0) {
                perror("status stdout");
                die("statusmsg stdout failed", 0);
        }
        if (fprintf(OUTF, msg, date, OUTN) < 0) {
                perror("status transcript");
                die("statusmsg transcript failed", 0);
        }
}

void done() {
        int status;
        wait(&status);
        if (!qflg)
                statusmsg(STOPMSG);
        chunk03(status);
        fclose(OUTF);
        close(PTM);
        close(PTS);
        tcsetattr(0, TCSADRAIN, &TT);
        exit(EXIT_SUCCESS);
}

void finish(int signal) {
        UNUSED(signal);
        CHILD = -1;
}

void winsize(unsigned int mode) {
        struct winsize size;
        ioctl(0, TIOCGWINSZ, &size);
        if (mode & 2)
                if (chunk11(&size) < 0)
                        die("writing window size", 0x11);
        if ((mode & 1) && PTM)
                ioctl(PTM, TIOCSWINSZ, &size);
}

void resized(int signal) {
        UNUSED(signal);
        winsize(3);
}

void doshell() {
        close(PTM);
        fclose(OUTF);
        setsid();
        ioctl(PTS, TIOCSCTTY, 0);
        dup2(PTS, 0);
        dup2(PTS, 1);
        dup2(PTS, 2);
        close(PTS);
        char *shell;
        if ((shell = getenv("SHELL")) == NULL)
                shell = "/bin/sh";
        char *shname;
        if ((shname = strrchr(shell, '/')) == NULL)
                shname = shell;
        else
                shname++;
        if (cflg != NULL)
                execl(shell, shname, "-c", cflg, NULL);
        else
                execl(shell, shname, "-i", NULL);
        perror(shell);
        die("execing the shell failed", 0);
}

void doio() {
        char iobuf[BUFSIZ];
        int count;
        fd_set fds;
        int sr;
        int highest = ((STDIN_FILENO > PTM) ? STDIN_FILENO : PTM) + 1;
        int drain = 0;
        if (!aflg)
                chunk(01);
        chunk(02);
        chunk(12);
        chunk(13);
        winsize(2);
        struct timespec ts;
        if (clock_gettime(CLOCK_MONOTONIC, &ts) < 0) {
                perror("CLOCK_MONOTONIC");
                die("retrieving monotonic time failed", 0);
        }
        if (!qflg)
                statusmsg(STARTMSG);
        while ((CHILD > 0) || drain) {
                if (!drain) {
                        FD_ZERO(&fds);
                        FD_SET(STDIN_FILENO, &fds);
                        FD_SET(PTM, &fds);
                        sr = select(highest, &fds, NULL, NULL, NULL);
                        if (CHILD < 0) {
                                int flags = fcntl(PTM, F_GETFL);
                                if (fcntl(PTM, F_SETFL, (flags | O_NONBLOCK)) == 0) {
                                        drain = 1;
                                        continue;
                                }
                        }
                        if (sr <= 0)
                                continue;
                        chunk16(&ts);
                        if (FD_ISSET(STDIN_FILENO, &fds)) {
                                count = read(STDIN_FILENO, iobuf, BUFSIZ);
                                if (count > 0) {
                                        fwrite(&SO, sizeof(SO), 1, OUTF);
                                        chunkwd((unsigned char *)iobuf, count);
                                        fwrite(&SI, sizeof(SI), 1, OUTF);
                                        write(PTM, iobuf, count);
                                }
                        }
                } // if (!drain)
                if (FD_ISSET(PTM, &fds)) {
                        count = read(PTM, iobuf, BUFSIZ);
                        if (count > 0) {
                                fwrite(iobuf, sizeof(char), count, OUTF);
                                write(STDOUT_FILENO, iobuf, count);
                        } else
                                drain = 0;
                }
                if (fflg)
                        fflush(OUTF);
        }
        done();
}

int main(int argc, char *argv[])
{
        MYNAME = argv[0];
        { char *lastslash;
                if ((lastslash = strrchr(MYNAME, '/')) != NULL)
                        MYNAME = lastslash + 1;
        }
        if ((argc == 2) &&
            (!strcmp(argv[1], "-V") || !strcmp(argv[1], "--version"))) {
                printf("%s %s\n", MYNAME, MYVERSION);
                return 0;
        }
        { int c; extern char *optarg; extern int optind;
                while ((c = getopt(argc, argv, "ac:fqt")) != -1)
                        switch ((char)c) {
                        case 'a':
                                aflg++; break;
                        case 'c':
                                cflg = optarg; break;
                        case 'f':
                                fflg++; break;
                        case 'q':
                                qflg++; break;
                        case 't':
                                break;
                        case '?':
                        default:
                                fprintf(stderr,
                                        "usage: %s [-afqt] [-c command] [file]\n",
                                        MYNAME);
                                exit(1);
                                break;
                        }
                argc -= optind;
                argv += optind;
        }
        if (argc > 0) {
                OUTN = argv[0];
        } else {
                struct stat s;
                if (lstat(OUTN, &s) == 0 && (S_ISLNK(s.st_mode) || s.st_nlink > 1)) {
                        fprintf(stderr, "Warning: `%s' is a link.\n"
                               "Use `%s [options] %s' if you really "
                               "want to use it.\n"
                               "%s not started.\n",
                               OUTN, MYNAME, OUTN, MYNAME);
                        exit(1);
                }
        }
        if ((OUTF = fopen(OUTN, (aflg ? "a+" : "w"))) == NULL) {
                perror(OUTN);
                die("the output file could not be opened", 0);
        }
        if (aflg) {
                char buf[5];
                size_t count;
                count = fread(&buf, sizeof(char), 5, OUTF);
                if (count == 0)
                        aflg = 0;
                else if (count != 5 || strncmp(buf, "\x0e\x0e\x01\x01\x0f", 5) != 0)
                        die("output file is not in forscript format v1, cannot append", 0);
        }
        tcgetattr(0, &TT);
        if ((PTM = posix_openpt(O_RDWR)) < 0) {
                perror("openpt");
                die("openpt failed", 0);
        }
        if (grantpt(PTM) < 0) {
                perror("grantpt");
                die("grantpt failed", 0);
        }
        if (unlockpt(PTM) < 0) {
                perror("unlockpt");
                die("unlockpt failed", 0);
        }
        { char *pts = NULL;
                if ((pts = ptsname(PTM)) != NULL) {
                        if ((PTS = open(pts, O_RDWR)) < 0) {
                                perror(pts);
                                die("pts open failed", 0);
                        }
                } else {
                        perror("ptsname");
                        die("ptsname failed", 0);
                }
        }
        {
                struct termios rtt = TT;
                rtt.c_iflag &= ~(IGNBRK | BRKINT | PARMRK | ISTRIP
                                 | INLCR | IGNCR | ICRNL | IXON);
                rtt.c_oflag &= ~OPOST;
                rtt.c_lflag &= ~(ECHO | ECHONL | ICANON | ISIG | IEXTEN);
                rtt.c_cflag &= ~(CSIZE | PARENB);
                rtt.c_cflag |= CS8;
                tcsetattr(0, TCSANOW, &rtt);
                tcsetattr(PTS, TCSANOW, &TT);
        }
                winsize(1);
        { struct sigaction sa;
                sigemptyset(&sa.sa_mask);
                sa.sa_flags = SA_NOCLDSTOP;
                sa.sa_handler = finish;
                sigaction(SIGCHLD, &sa, NULL);
                sa.sa_handler = resized;
                sigaction(SIGWINCH, &sa, NULL);
        }
        if ((CHILD = fork()) < 0) {
                perror("fork");
                die("fork failed", 0);
        }
        if (CHILD == 0)
                doshell();
        else
                doio();
        return EXIT_SUCCESS;
}
