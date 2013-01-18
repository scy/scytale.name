<?php
	if (php_sapi_name() == 'cli') {
		if (isset($_SERVER['argv'][1])) {
			define('SECTION', $_SERVER['argv'][1]);
		}
	}
	require_once('scytale.name.php');
	lang('en de', true);
	ftr();
?>
