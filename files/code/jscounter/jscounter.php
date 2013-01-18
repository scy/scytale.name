<?php

$file = '/var/www/scytale.de/res/jscounter/count.'.substr(preg_replace('|[^a-zA-Z0-9]|', '', trim($_SERVER['QUERY_STRING'])), 0, 20).'.dat';

if(!is_file($file))
	die("document.write('Heute nur f&uuml;r Stammg&auml;ste.');\n");

$num = (int)@filesize($file);
$num++;

if ($num < 20000000) {
	$fp = fopen($file, 'a');
	fwrite($fp, '.');
	fclose($fp);
}

echo("/* Simple JavaScript counter, written in Pragmatic PHP and powered by scytale.de */\n");
echo("document.write('$num');\n");

?>