--bgcolor white
--fgcolor blue

--author Tim Weber <scy-talk-bash@scytale.name>
--title Bash f�r CTFler
--date 2008 Nov 12

--sethugefont slant
--huge #!/bin/bash

--newpage philosophie
--heading Die Unix-Philosophie

---
Schreibe Computerprogramme so, dass sie nur eine Aufgabe erledigen und diese gut machen.

---
Schreibe Programme so, dass sie zusammen arbeiten.

---
Schreibe Programme so, dass sie Textdateien verarbeiten, denn dies ist eine universelle Schnittstelle.

--newpage bash
--heading Was ist die bash?

---
"Bourne-again shell", Anspielung darauf, dass sie eine Weiterentwicklung der Bourne-Shell ist.
Entwickelt Ende der 80er.

---
Viele Alternativen (zsh, csh, ksh, ash, ...).

---
Gemeinsamer Standard (POSIX), Shellscripte _sollten_ portierbar sein. (Sind sie aber selten.)

---
Eigentlich nur Benutzerinterface sowie "Mittler" zwischen einzelnen Befehlen, die manchmal zwar direkt in die Shell eingebaut sind (z.B. echo), aber meist zu anderen Paketen (z.B. coreutils).

--newpage syntax
--heading Befehlssyntax

---
--beginshelloutput
$ variable=wert    # Wichtig: ohne Leerzeichen
---
$ echo $variable
wert
---
$ echo "$variable mit double quotes" '$variable mit single quotes'
wert mit double quotes $variable mit single quotes
---
$ echo 'Jetzt kommt ein Verzeichnislisting:'; ls
Jetzt kommt ein Verzeichnislisting:
a.txt   b.txt
--endshelloutput

--newpage io
--heading Ein- und Ausgabe

---
Unter Unix ist bekanntlich alles eine Datei. Will ein Programm mit einer Datei arbeiten, bekommt es vom Betriebssystem einen Handle auf diese Datei zur�ck (beliebige Zahl, also eine "Zugriffs-ID").

---
Vordefinierte Handles: 0 (Standardeingabe), 1 (Standardausgabe), 2 (Standardfehlerausgabe).

---
Diese werden vom Betriebssystem oder der Shell bereits mit den korrekten "Dateien" verbunden, z.B. der Tastatur, dem Bildschirm, einer echten Datei oder einer Pipe ("R�hre"), die zu einem anderen Programm f�hrt.

--newpage cat
--heading Der Befehl cat (concatenate)

---
--beginshelloutput
$ cat a.txt
Das hier ist Text.
$ cat b.txt
Hier steht auch Text drin.
$ cat b.txt a.txt
Hier steht auch Text drin.
Das hier ist Text.
--endshelloutput

--newpage echo
--heading Der Befehl echo

Gibt den angegebenen Text aus.

Der Unterschied zu cat liegt darin, dass die Parameter nicht Dateinamen, sondern direkt den Text angeben.

---
--beginshelloutput
$ echo Hallo.
Hallo.
$ cat Hallo.
cat: Hallo.: No such file or directory.
--endshelloutput

--newpage head
--heading Der Befehl head

Zeigt nur die ersten X Zeilen einer Datei an (Standard: 10).

Alternative auch: die ersten X Byte, oder "alle bis auf die letzten X Zeilen/Byte".

---
--beginshelloutput
$ head -n 2 erlkoenig.txt
Wer reitet so sp�t durch Nacht und Wind?
Es ist der Vater mit seinem Kind.
$ head -c 7 erlkoenig.txt
Wer rei
$ head -n -3 allemeineentchen.txt
Alle meine Entchen
Schwimmen auf dem See
--endshelloutput

--newpage tail
--heading Der Befehl tail

Zeigt nur die letzten X Zeilen oder Byte an, bzw. "alle bis auf die ersten X Zeilen/Byte".

---
--beginshelloutput
$ tail -n 1 erlkoenig.txt
In seinem Arm das Kind war tot.
$ tail -c 5 erlkoenig.txt
tot.
$ tail -n -4 allemeineentchen.txt
Schw�nzchen in die H�h'.
--endshelloutput

--newpage wc
--heading Der Befehl wc (word count)

---
--beginshelloutput
$ cat a.txt
Das hier ist Text.
$ wc a.txt
 1  4 19 a.txt
$ wc -l a.txt
1 a.txt
--endshelloutput

--newpage out-redir
--heading Umleiten in eine Datei
---

--revon
--center  > 
--revoff

Leitet die Ausgabe in eine Datei, die neu angelegt wird. Falls sie bereits existiert, wird sie �berschrieben.

---
--color red
--ulon
--center Hier gilt der Grundsatz: "Unix wurde nicht entwickelt, um seine Benutzer daran zu hindern, dumme Dinge zu tun, denn das w�rde diese auch davon abhalten, schlaue Dinge zu tun." (Doug Gwyn)
--uloff
--color blue

---
--beginshelloutput
$ cat a.txt > b.txt
$ cat b.txt
Das hier ist Text.
--endshelloutput

--newpage out-append
--heading Anh�ngen an eine Datei
---

--revon
--center  >> 
--revoff

Leitet die Ausgabe in eine Datei und h�ngt dabei an den bestehenden Inhalt an. Falls die Datei noch nicht existiert, wird sie angelegt.

---
--beginshelloutput
$ cat a.txt >> b.txt
$ cat b.txt
Das hier ist Text.
Das hier ist Text.
--endshelloutput

--newpage pipe
--heading A Series of Tubes
---

--revon
--center  | 
--revoff

Verbindet die Standardausgabe des linken Befehls mit der Standardeingabe des rechten Befehls. Auf Deutsch: Leitet die Ausgabe des ersten Befehls an den zweiten.

---
--beginshelloutput
$ echo Hier kommt Kurt. > kurt.txt
$ cat kurt.txt b.txt | wc -l
3
--endshelloutput
---
Merke: Wenn gar keine Dateien als Parameter angegeben werden, lesen die meisten Befehle von der Standardeingabe.

--newpage keyboard-stdin
--heading Standardeingabe von der Tastatur

Falls die Standardeingabe f�r einen Befehl nicht aus einer Pipe kommt, liest er eben von der Tastatur (die ja die "Default-Standardeingabe" ist), und zwar so lange, bis man �ber die Tastenkombination Strg+D (abgek�rzt ^D) sagt, dass der Eingabestrom beendet ist. (Wenn dein Script irgendwie "h�ngt", ist ein vergessener Eingabedateiname oft der Grund.)

---
--beginshelloutput
$ wc -l
Ich muss durch den Monsun
Hinter die Welt
Ans Ende der Zeit
^D
3
--endshelloutput

--newpage in-redir
--heading Standardeingabe �ndern

Eingabe aus einer Datei (<), direkt bis zum Nennen eines Stoppwortes (<<, praktisch in Scripts) oder wie bei einer echo-Pipe (<<<).

---
--beginshelloutput
$ wc -w < kurt.txt
3
$ wc -l <<PUDEL
Wieso, weshalb, warum?
Wer nicht fragt bleibt dumm.
PUDEL
2
$ wc -m <<< 'Du Homofuerst.'
15
--endshelloutput

--newpage cut
--heading Einzelne Felder ausgeben mit cut

Splittet eine Eingabedatei zeilenweise in mehrere Felder auf, die durch den Delimiter (Parameter "-d") getrennt sind.

---
--beginshelloutput
$ head -n 1 /etc/passwd
root:x:0:0:root:/root:/bin/zsh
$ head -n 1 /etc/passwd | cut -d : -f 1,7
root:/bin/zsh
$ head -n 2 /etc/passwd | cut -c 2-4
oot
ash
--endshelloutput

--newpage sort
--heading Daten sortieren mit sort

Sortiert die Eingabedaten auf recht flexible Weise (siehe --help). Standard: Alphabetisch.

---
Alphabetische Benutzerliste:
--beginshelloutput
$ cut -d : -f 1 /etc/passwd | sort | head -n 3
ajaxterm
arpwatch
avahi
$ sort -t : -n -r -k 3 /etc/passwd | head -n 2
nobody:x:65534:65534:nobody:/nonexistent:/bin/sh
grml:x:1000:1000::/home/grml:/bin/zsh
--endshelloutput

--newpage uniq
--heading Dubletten entfernen mit uniq

Entfernt doppelt vorkommende Zeilen in der Eingabe, die allerdings bereits vorsortiert sein muss. Hat au�erdem noch ein paar lustige Bonusfunktionen, wie immer siehe --help.

---
Alle auf dem System von irgendeinem Benutzer verwendeten Shells:
--beginshelloutput
$ cut -d : -f 7 | sort | uniq
/bin/bash
/bin/false
/bin/sh
/bin/sync
/bin/zsh
/dev/null
/usr/sbin/nologin
--endshelloutput

--newpage for
--heading Schleifen mit for

for ZAEHLER in WERT1 WERT2 WERT3 WERTn; do
   BEFEHLE
done

---
--beginshelloutput
$ for x in a b c; do echo "$x" > "${x}.txt"; cat "${x}.txt"; done
a
b
c
---
$ for x in ?.txt; do mv "$x" "${x}.aha"; done; ls
a.txt.aha   b.txt.aha   c.txt.aha
--endshelloutput

--newpage count-for
--heading Z�hlende for-Schleifen

---
--beginshelloutput
$ # Maximale Kompatibilit�t, minimale Geschwindigkeit:
$ # "seq" aus den coreutils
$ seq 1 10
1 2 3 4 5 6 7 8 9 10
$ for i in $(seq 1 10); do echo -n .; done; echo
..........
$ # Ab bash 3:
$ for i in {1..10}; do echo -n .; done; echo
..........
$ # Wom�glich auch bash-only, kA...
$ for (( i=1; i<10; i++ )); do echo -n .; done; echo
..........
--endshelloutput

--newpage if
--heading Verzweigung mit if

if BEFEHL; then
   BEFEHLE
elif BEFEHL; then
   BEFEHLE
else
   BEFEHLE
fi

---
--beginshelloutput
$ if mkdir verzeichnis; then echo Erstellt; else echo PANIK; fi
Erstellt.
--endshelloutput

--newpage dollar
--heading Verwendung von Ausgaben mit $()

---
--beginshelloutput
$ date +%F
2008-11-12
---
$ echo Heute ist Workshop. > "$(date +%F).txt"
$ ls
2008-11-12.txt
$ cat 2008-11-12.txt
Heute ist Workshop.
--endshelloutput
---
`Backticks` sind �quivalent, aber nicht schachtelbar und schwerer zu lesen, daher wird $() dringend empfohlen.

--newpage expr
--heading Rechnen und so mit expr

--beginshelloutput
$ expr 9 - 12
-3
$ expr length foobar
6
$ expr index foobar b
4
--endshelloutput
Die einzelnen Operanden einer Rechenanweisung m�ssen als einzelne Parameter �bergeben werden (also mit Leerzeichen abgetrennt). Von der Shell ausgewertete Zeichen wie * (Multiplikation) m�ssen nat�rlich mit \ oder Singlequotes escaped werden.

expr arbeitet nur mit ganzen Zahlen. F�r komplexere Berechnungen hilft bc, aber auch bash kann in begrenztem Ma�e rechnen: $(()).

--newpage wget
--heading HTTP-Zugriffe mit wget und curl

wget ist auf den meisten Systemen verf�gbar, w�hrend curl praktische Funktionen zum Senden von Daten und Simulieren von Formularaktivit�ten besitzt, daher sollte man zumindest mit beiden Tools ansatzweise umgehen k�nnen.

---
--beginshelloutput
$ # �quivalente Nutzung von wget und curl (Ausgabe auf stdout):
$ wget -q -O - http://scytale.name/files/scytale.opml | head -n 1
<opml version="2.0">
$ curl -s https://scytale.name/files/2007/11/eurosignal.py | wc
    154     563    4717
--endshelloutput

Merke: "-" ist bei vielen Tools eine Abk�rzung f�r die Standardausgabe. Alternativ kann man meist auch "/dev/stdout" verwenden.

--newpage tr
--heading Zeichen ersetzen mit tr (translate)

---
--beginshelloutput
$ echo foo | tr o e
fee
---
$ echo 'Drei Chinesen mit nem Kontrabass' | tr aeiou i
Drii Chinisin mit nim Kintribiss
---
$ # Kombination von "L�schen" und "Komplement":
$ echo 0621 / 181-2342 | tr -cd 0-9
06211812342
--endshelloutput

--newpage grep-params
--heading Filtern mit grep: Parameter

---
-i  case-insensitive (Gro�-/Kleinschreibung ignorieren)
-E  erweiterte regul�re Ausdr�cke (auch "egrep")
-v  nur Zeilen, die _nicht_ matchen
-q  keine Ausgabe, nur Returncode ob Match oder nicht
-o  nur matchenden Teil der Zeile ausgeben
-c  nur Anzahl matchender Zeilen ausgeben
-l  nur Namen der matchenden Dateien ausgeben
-m  nach X Matches Suche in der Datei beenden
-r  rekursives Matchen in Unterverzeichnissen
-H  Dateiname mit ausgeben (-h zum Deaktivieren)
-n  Zeilennummer mit ausgeben

--newpage grep-examples
--heading Filtern mit grep: Beispiele

---
grep arbeitet zeilenweise, Matches �ber mehrere Zeilen hinweg sind also nicht m�glich (aber man kann z.B. mit "tr -d '\n'" schummeln).

---
--beginshelloutput
$ # Flags aus einer Datei holen.
$ grep -oE '[0-9a-f]{32}' foo.txt
f16928d17c54213e06e68224b5bba68a
96a92e6d00292f85b09ca5ba0d7d9806
---
$ # URLs aus den Chatlogs fischen.
$ grep -Ero '[a-z0-9+-]+://[^ ]+' ~/.irssi/logs
[...]
--endshelloutput

--newpage sed
--heading Manipulationen mit sed (stream editor)

---
s[uche]/Ausdruck/Ersetzung/Flags
---
--beginshelloutput
$ echo foo dee doo | sed -e 's/oo/u/g' -e 's/ee/i/g'
fu di du
---
$ echo Bar Foo | sed -r -e 's/^(.+) (.+)$/\2 \1/'
Foo Bar
---
$ echo -e 'ab5\nxyz\no2u' | sed -rn -e 's/.*([0-9]+).*/\1/p'
5
2
--endshelloutput
Flags: g (global, mehr als ein Match pro Zeile), p (print, Ergebnis ausgeben (in Kombination mit -n)).
Parameter: -r (erweiterte Ausdr�cke), -n (nur Matches mit p-Flag ausgeben, nicht matchende Zeilen nicht).

--newpage omit
--heading Interessantes, das weg gelassen werden musste

find, tee, case, tac, der Unterschied zwischen [ und [[, Befehle gruppieren mit () und {}, Funktionen, Aliase

--newpage achja
--heading Ach ja...

Man machte mich nach dem Vortrag darauf aufmerksam, dass es praktisch w�re, die Leute darauf hinzuweisen, dass man Bash-Befehle auch in einer Datei niederschreiben kann, um sie dann alle auf einmal auszuf�hren; sowas nennt sich dann ein "Script".

Ich hielt das f�r trivial genug, um es nicht zu erw�hnen, aber ja, das kann man. Pr�ferierte Dateinamenserweiterung ist .sh, man kann das Script mit "chmod u+x dateiname.sh" ausf�hrbar machen, wenn als erste Zeile folgendes in der Datei steht:

#!/bin/bash
