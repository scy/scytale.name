<?php
	if (php_sapi_name() == 'cli') {
		if (isset($_SERVER['argv'][1])) {
			$title = $_SERVER['argv'][1];
			define('SECTION', $title);
		}
	} else {
		$title = $_SERVER['REQUEST_URI'];
	}
	require_once('scytale.name.php');
	lang('en de');
	hdr(htmlspecialchars($title));
?>
