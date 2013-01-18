<?php
require_once('scytale.name.php');
lang('en de');
$err = 200;
if (isset($_SERVER['REDIRECT_STATUS']))
	$err = (int)$_SERVER['REDIRECT_STATUS'];

$errors = array('en' => array(
200 => 'OK|<p>Error code 200 is no error, but rather means "no error occured". You most likely called this error handler manually even though there was no error at all. Oh well.</p>',
403 => 'forbidden|<p>You do not have permission to view this page, sorry.</p>',
404 => 'not found|<p>The file you requested is no longer available or never existed.</p><ul><li>If you typed the address directly into your browser\'s address bar, please check it for typing errors.</li><li>If you came here from another web site, please inform the maintainer of that web site.</li><li>If you came here using an internal link on ' . sn() . ', please use the contact information below to notify me. Please note that files below <a href=\'/files/tmp/\'>/files/tmp/</a> can be deleted without announcing in advance.</li><li>You may also contact me if you are desperately looking for some information that used to be here once, I\'ll see whether I can find something in my archives.</li></ul>',
405 => 'method not allowed|<p>Your request method is not allowed. You are most likely pentesting this server, please buzz off.</p>',
410 => 'gone|<p>This address once existed, but has been deleted. The reason for this could be that it was a never-finished project, hopelessly outdated or that it has been taken down for legal reasons. If you need more information, please contact me.</p>',
500 => 'internal server error|<p>An internal server error occured. This means that something is broken on my server. Please retry in a couple of minutes. If the problem persists, please contact me.</p>',
503 => 'service unavailable|<p>Your request cannot be handled at the moment, most likely because the server is already handling its maximum number of concurrent requests. Please try again later. If the problem persists, please contact me.</p>',
), 'de' => array(
200 => 'OK|<p>Fehlercode 200 ist kein Fehler, sondern bedeutet "kein Fehler aufgetreten". Sie haben wahrscheinlich diese Fehlerbehandlung manuell aufgerufen, obwohl es überhaupt keinen Fehler gab. Nun ja.</p>',
403 => 'verboten|<p>Sie haben leider keine Berechtigung, diese Seite zu betrachten.</p>',
404 => 'nicht gefunden|<p>Die angeforderte Datei ist nicht mehr verfügbar oder existierte nie.</p><ul><li>Wenn Sie die Adresse direkt in die Adresszeile Ihres Browsers eingegeben haben, prüfen Sie sie auf Tippfehler.</li><li>Wenn Sie von einer fremden Website hierher kamen, informieren Sie bitte den Verantwortlichen jener Website.</li><li>Wenn Sie über einen internen Link auf ' . sn() . ' hierher kamen, benutzen Sie bitte die unten stehenden Kontaktinformationen, um mich zu benachrichtigen. Bitte beachten Sie, dass Dateien unter <a href=\'/files/tmp/\'>/files/tmp/</a> jederzeit ohne Ankündigung gelöscht werden können.</li><li>Sie können mich ebenfalls kontaktieren, wenn Sie verzweifelt nach Informationen suchen, die sich hier einst befunden haben. Ich werde sehen, ob ich etwas in meinen Archiven finden kann.</li></ul>',
405 => 'Methode nicht erlaubt|<p>Ihre Request-Methode ist nicht erlaubt. Wahrscheinlich pentesten Sie diesen Server, bitte verschwinden Sie.</p>',
410 => 'verschwunden|<p>Diese Adresse existierte einst, wurde aber gelöscht. Der Grund dafür könnte sein, dass es sich um ein nie beendetes Projekt handelte, dass die Informationen hoffnungslos veraltet waren oder dass sie aus rechtlichen Gründen vom Netz genommen wurden. Falls Sie weitere Informationen benötigen, kontaktieren Sie mich bitte.</p>',
500 => 'interner Serverfehler|<p>Ein interner Serverfehler ist aufgetreten. Das bedeutet, dass auf meinem Server etwas kaputt ist. Bitte versuchen Sie es in ein paar Minuten erneut. Falls das Problem weiterhin besteht, informieren Sie mich bitte.</p>',
503 => 'Dienst nicht verfügbar|<p>Ihre Anfrage kann momentan nicht verarbeitet werden, wahrscheinlich weil der Server bereits seine Maximalanzahl gleichzeitiger Anfragen verarbeitet. Bitte versuchen Sie es später erneut. Fals das Problem weiterhin besteht, informieren Sie mich bitte.</p>',
));

if (isset($errors[$LANG][$err])) {
	$error = explode('|', $errors[$LANG][$err]);
	$short = $error[0];
	$long  = $error[1];
} else {
	$short = i18n(array('en' => 'unknown', 'de' => 'unbekannt'), true);
	$long = i18n(array('en' => '<p>There is no additional description of that error available.</p>', 'de' => '<p>Es ist keine weitere Beschreibung des Fehlers verfügbar.</p>'), true);
}

hdr(array('en' => "Error $err ($short)", 'de' => "Fehler $err ($short)"));
echo("<p class='error'>\n\t");
i18n(array('en' => "While handling your request, an error with code $err ($short) occured. A more detailed description follows.", 'de' => "Beim Bearbeiten Ihrer Anfrage trat ein Fehler mit dem Code $err ($short) auf. Es folgt eine detailliertere Beschreibung."));
echo("\n</p>\n");

echo($long);
echo("\n<h2>");
i18n(array('en' => 'Contact', 'de' => 'Kontakt'));
echo("</h2>\n<p>\n\t");
i18n(array('en' => 'If you think that this error is my fault and that I should do something about it, please <a href=\'/contact/\'>contact me</a>. You should include the following information to make it easier for me to reproduce the error.', 'de' => 'Falls Sie der Meinung sind, dass dieser Fehler meine Schuld ist und dass ich etwas dagegen tun sollte, <a href=\'/contact/\'>kontaktieren Sie mich</a> bitte. Sie sollten die folgenden Informationen beifügen, um es mir leichter zu machen, den Fehler nachzuvollziehen.'));
echo("\n</p>\n<table>\n");

$info = array(
	'Status' => $err,
	'Date and Time' => date('c'),
	'Request' => $_SERVER['REQUEST_URI'],
	'Method' => $_SERVER['REQUEST_METHOD'],
	'Referrer' => $_SERVER['HTTP_REFERER'],
	'Client IP' => $_SERVER['REMOTE_ADDR'],
	'Agent' => $_SERVER['HTTP_USER_AGENT'],
);

foreach ($info as $k => $v) {
	$v = htmlspecialchars($v);
	echo("\t<tr><th>$k</th><td>$v</td></tr>\n");
}
echo("</table>\n");

ftr();
?>
