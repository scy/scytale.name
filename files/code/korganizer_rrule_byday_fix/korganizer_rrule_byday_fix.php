<?php

$ical = preg_replace('/\r\n/', "\n", file_get_contents('php://stdin'));
echo (ical_remove_timezones(korganizer_rrule_fix($ical)));

function korganizer_rrule_fix($ical) {
	$pattern = '/^BEGIN:VEVENT$.+^RRULE:FREQ=WEEKLY;.+$.+^END:VEVENT$/Ums';
	return (preg_replace_callback($pattern, 'korganizer_rrule_fix_iter', $ical));
}

function korganizer_rrule_fix_iter($m) {
	if (preg_match('/^RRULE:(|.*;)BYDAY=.*$/Um', $m[0]))
		return ($m[0]);
	if (!preg_match('/^DTSTART(;.+)?:([0-9]{4})([01][0-9])([0-3][0-9]).*$/Um', $m[0], $date))
		return ($m[0]);
	$date = mktime(12, 0, 0, $date[3], $date[4], $date[2]);
	$day = date('w', $date);
	switch ($day) {
		case 0: $dayt = 'SU'; break;
		case 1: $dayt = 'MO'; break;
		case 2: $dayt = 'TU'; break;
		case 3: $dayt = 'WE'; break;
		case 4: $dayt = 'TH'; break;
		case 5: $dayt = 'FR'; break;
		case 6: $dayt = 'SA'; break;
		default: return ($m[0]);
	}
	return (preg_replace('/^(RRULE:.+)$/Ums', '$1;BYDAY='.$dayt, $m[0]));
}

function ical_remove_timezones($ical) {
	// Removes timezone _defintions_ in the file.
	return (preg_replace('/^DT(START|END);TZID=.+:/Um', 'DT$1:', preg_replace('/(^BEGIN:VTIMEZONE$.+^END:VTIMEZONE$|^X-WR-TIMEZONE:.+$)/Ums', '', $ical)));
}

?>
