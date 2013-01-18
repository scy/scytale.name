<?php

$reis = '0.5';

for ($i = 1; $i <= 64; $i++) {
	if ($i > 2) {
		$enno = bcpow($enno, '2');
	} else {
		$enno = (string)$i;
	}
	$reis = bcmul($reis, '2');
	printf("Feld %2d: %s (%s)\n", $i, $reis, $enno);
}

?>
