<html><head><title>register_globals-Beispiel</title></head><body><pre><?php
function getbuchungen($id) {
	return (array(50, -3, 471.10, -235.17));
}

if ($_GET['rg'])
	var_dump(ini_set('register_globals', true));

$buchungen = getbuchungen($kundenid);
foreach ($buchungen as $buchung) {
	echo("\$summe = $summe, addiere \$buchung = $buchung...\n");
	$summe = $summe + $buchung;
}
echo("Endsumme: $summe, addiere Zinsen...\n");
$summe += ($zinsen = $summe * 0.03);
echo("Kontostand: $summe\n");
?></pre></body></html>