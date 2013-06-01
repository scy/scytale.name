<?php

die('This code is no longer active and exists only for documentation purposes.');

$ip = preg_replace('/[^0-9.]/', '', $_GET['ip']);
$user = preg_replace('/[^0-9a-zA-Z_-]/', '', $_GET['user']);
$pass = preg_replace('/[^0-9a-zA-Z_-]/', '', $_GET['pass']);

if ($user !== 'RgSZfI7ss0rQ2w9' || $pass !== '78FZ4IF-w10Kew3EK') {
	die('Bad credentials.');
}

$last = @file_get_contents('serial.txt');
if ($last === false) {
	$last = array('date' => '', 'counter' => 0);
} else {
	$last = unserialize($last);
}

$serial = date('Ymd');
if ($last['date'] == $serial) {
	$last['counter']++;
	if ($last['counter'] > 99) {
		die('Counter too high!');
	}
} else {
	$last['date'] = $serial;
	$last['counter'] = 0;
}
$serial .= sprintf('%02d', $last['counter']);
file_put_contents('serial.txt', serialize($last));

$body = "
user: blafasel
job: ns
task: upd
domain: scytale.name
primary: yours
zonefile: /begin
\$TTL 86400
@   IN SOA ns1.first-ns.de. postmaster.robot.first-ns.de. (
    $serial   ; serial
    14400        ; refresh
    1800         ; retry
    604800       ; expire
    86400 )      ; minimum
 
@                        IN NS      robotns3.second-ns.com.
@                        IN NS      robotns2.second-ns.de.
@                        IN NS      ns1.first-ns.de.
 
@                        IN A       188.94.113.130
localhost                IN A       127.0.0.1
mail                     IN A       188.94.113.130
v                        IN A       188.94.113.130
www                      IN A       188.94.113.130
v                        IN AAAA    2001:470:1f0a:d5f::2
u5                    69 IN A       $ip
u5                       IN AAAA    2001:470:1f0a:c4f::2
eridanus                 IN A       82.98.87.120
eridanus                 IN AAAA    2a02:2e0:3fc:52::62:5778:140
loopback                 IN CNAME   localhost
@                        IN MX 10   mail.scy.name.
@                        IN TXT     google-site-verification=sr-DlZu-oN_Ah1wQsjhFQeQ8McFxWpUVj-GIkc2IJQw
/end
";

$proc = proc_open('gpg --clearsign --armor', array(
	0 => array('pipe', 'r'),
	1 => array('pipe', 'w'),
	2 => array('pipe', 'w'),
), $pipes);
if (!is_resource($proc)) {
	die('Could not open GPG child');
}

fwrite($pipes[0], $body);
fclose($pipes[0]);
$signed = stream_get_contents($pipes[1]);
fclose($pipes[1]);
echo stream_get_contents($pipes[2]);
fclose($pipes[2]);
$rc = proc_close($proc);

$ok = mail('robot@robot.first-ns.de', 'Robot order', $signed, "From: scy-blafasel@scytale.name");
var_dump(array('mail sent' => $ok));

$heurl = "https://ipv4.tunnelbroker.net/ipv4_end.php?ip=$ip&apikey=...&pass=...&tid=...";
echo file_get_contents($heurl);
