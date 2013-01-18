<?php

require_once('qb-0.2.conf.dist.php');

function embedqb() {
	$buffer = ob_get_clean();
	$buffer = preg_replace('|^<\\?xml (?s:.+)<div id=\'ye_olde\'>.+</div>$|m', '', $buffer);
	$buffer = preg_replace('|^</body>.+</html>$|ms', '', $buffer);
	$buffer = preg_replace('|<(/?)h3>|', '<$1h2>', $buffer);
	echo($buffer);
	ftr();
}

if ($_SERVER['QUERY_STRING'] != 'atom10') {
	require_once('scytale.name.php');
	define('QB_END_CALLBACK', 'embedqb');
	lang('en de'); // i18n initialization needed by scytale.name.php
	hdr('Blog');
	ob_start();
}

?>
