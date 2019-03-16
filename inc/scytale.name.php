<?php

header('Content-Type: text/html; charset=UTF-8');

if (!isset($_GET['novum'])) {
	define('DEFAULTSTYLE', 'default.css');
	define('TRENNER', '::');
	define('NOVUM', true);
} else {
	define('DEFAULTSTYLE', 'default-old.css');
	define('TRENNER', '&laquo;');
	define('NOVUM', false);
}

if (!defined('SECTION'))
	define('SECTION', preg_replace('/[^a-z]/', '', substr($_SERVER['REQUEST_URI'], 1, @strpos($_SERVER['REQUEST_URI'], '/', 1) - 1)));

function hdr($tit) {
	global $license;
	$title = $tit;
	if (is_array($tit))
		$title = i18n($tit, true);
	$ob = ob_get_clean();
	ob_end_clean();
	$fbtype = 'article';
	if ($title == 'Blog') { // FIXME: omg baaad hack
		$atom  = "\t<link rel='alternate' type='application/atom+xml' title='scytale.name Atom 1.0 Feed' href='http://scytale.name/blog/?atom10'/>\n";
		$atom .= "\t<link rel='alternate' type='application/atom+xml' title='qb News Atom 1.0 Feed' href='http://scytale.name/blog/qb/?atom10'/>\n";
		$license = "\t\t\t".'<br/><a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/de/"><img alt="Creative Commons License" style="border-width:0" src="//style/07/cc-by-sa-80x15.png" /></a><br /><span xmlns:dc="http://purl.org/dc/elements/1.1/" href="http://purl.org/dc/dcmitype/Text" property="dc:title" rel="dc:type">Scytale&#8217;s Blog</span> von <a xmlns:cc="http://creativecommons.org/ns#" href="http://scytale.name/" property="cc:attributionName" rel="cc:attributionURL">Tim Weber</a> steht unter einer <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/de/">Creative Commons Namensnennung-Weitergabe unter gleichen Bedingungen 3.0 Deutschland Lizenz</a>.<br />Beruht auf einem Inhalt unter <a xmlns:dc="http://purl.org/dc/elements/1.1/" href="http://scytale.name/blog/" rel="dc:source">scytale.name</a>.'."\n";
		$fbtype = 'blog';
	} else
		$atom = $license = '';
	echo('<' . '?xml version="1.0" encoding="utf-8"?' . ">\n$ob");
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns='http://www.w3.org/1999/xhtml'>

<head>
	<link rel='stylesheet' type='text/css' href='/style/07/body.css' />
	<link rel='stylesheet' type='text/css' href='/style/07/<?php echo(DEFAULTSTYLE); ?>' />
	<!--[if IE ]>
		<link rel='stylesheet' type='text/css' href='/style/07/drecksteil.css' />
	<![endif]-->
<?php echo($atom); ?>	<title><?php echo($title); ?> <?php echo(TRENNER); ?> scytale.name</title>
	<meta property="og:site_name" content="scytale.name" />
	<meta property="fb:admins" content="100000640633798" />
	<meta property="og:title" content="<?php echo(htmlspecialchars($title)); ?>" />
	<meta property="og:type" content="<?php echo($fbtype); ?>" />
	<meta property="og:description" content="" />
	<meta property="og:image" content="http://scytale.name/files/tmp/avatar184.jpg" />
</head>

<body class='<?php echo(SECTION); ?>'>
	<?php if(NOVUM) { ?><div id='RIGHTDOTS'><?php } ?><div id='<?php echo((NOVUM)?('LEFTDOTS'):('CENTER')); ?>'>
		<div id='HEAD'>
			<h1 class='<?php echo(SECTION); ?>'><?php echo($title); ?></h1>
		</div>
		<div id='MAIN'>
<?php
}

function ftr() {
	global $license;
	?>
		</div>
		<div id='FOOT'>
			<a href='/contact/' class='contact'><?php i18n(array('en' => 'Imprint&nbsp;/ Contact&nbsp;/ Disclaimer', 'de' => 'Impressum&nbsp;/ Kontakt&nbsp;/ Haftungsausschluss')); ?></a>
<?php echo($license); ?>		</div>
	</div></div>
	<div id='LEFT'><div id='SITENAME' class='<?php echo(SECTION); ?>'><a href='/'><?php echo(sn()); ?></a></div><div id='MENUCONNECT'><img src='/style/07/menuconnect.gif' width='120' height='7' alt='Dekoration' /></div><div id='MENU'><ul
		><li
			><a href='/blog/' class='blog'>Blog</a></li><li
			><a href='/proj/' class='proj'><?php i18n(array('en' => 'Projects', 'de' => 'Projekte')); ?></a><ul><li
				><a href='/proj/forscript/'>forscript</a></li><li
				><a href='http://levit.at/ion/'>Levitation</a></li><li
				><a href='/proj/dretweet/'>dretweet</a></li><li
				><a href='/proj/qb/'>qb: quick blogging</a></li><li
				><a href='/git/'><?php i18n(array('en' => 'Source Code at', 'de' => 'Quellcode bei')); ?> GitHub</a></li></ul></li><li
			><a href='/files/' class='files'><?php i18n(array('en' => 'Files', 'de' => 'Dateien')); ?></a><ul><li
				><a href='/files/talks/'><?php i18n(array('en' => 'Talks', 'de' => 'Vortr&auml;ge')); ?></a></li><li
				><a href='/files/doc/'><?php i18n(array('en' => 'Writings', 'de' => 'Geschreibsel')); ?></a></li><li
				><a href='/files/scytale.asc'><?php i18n(array('en' => 'PGP key', 'de' => 'PGP-Key')); ?></a></li></ul></li><!--<li
			><a href='/me/'><?php i18n(array('en' => 'About Me', 'de' => '&uuml;ber mich')); ?></a></li>--><li
			><a href='/wish/' class='wish'><?php i18n(array('en' => 'Wishlist', 'de' => 'Wunschzettel')); ?></a></li><li
			><a href='/contact/' class='contact'><?php i18n(array('en' => 'Contact', 'de' => 'Kontakt')); ?></a></li></ul
		></div>
	</div>
	<div id='RIGHT'><div id='AVATAR'><!-- <a href='/me/' title='<?php i18n(array('en' => 'about me', 'de' => 'über mich')); ?>'> --><img src='/style/07/scytale.png' width='48' height='48' alt='Scytale, <?php i18n(array('en' => 'avatar image', 'de' => 'Avatarbild')); ?>' /><!-- </a> --></div></div>
</body>

</html><?php
}

function sn() {
	return ("<var class='sn host'>scytale.name</var>");
}

function lang($allowed = 'de en', $quiet = false) {
	global $LANG;
	ob_start();
	$allowed = explode(' ', strtolower($allowed));
	$LANG = $allowed[0];
	$msg = "no language preference supplied, defaulting to '$LANG'";
	$broke = false;
	if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
		$accept = preg_split('/,\\s*/', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
		foreach ($accept as $item) {
			$newitem = preg_replace('/^([a-z]+)[^a-z].*$/', '$1', strtolower($item));
			if (array_search($newitem, $allowed) !== false) {
				$LANG = $newitem;
				$msg = "language preference '" . htmlspecialchars($item) . "' led to choosing language '$LANG'";
				$broke = true;
				break;
			}
		}
		if (!$broke)
			$msg = "no support for all languages in browser preference '" . htmlspecialchars($_SERVER['HTTP_ACCEPT_LANGUAGE']) . "', defaulting to '$LANG'";
	}
	if (isset($_GET['LANG'])) {
		if (array_search($tmp = strtolower($_GET['LANG']), $allowed) !== false) {
			$LANG = $tmp;
			$msg = "language override to '$LANG' via GET parameter '" . $_GET['LANG'] . "'";
		} else {
			$msg = "GET parameter '" . htmlspecialchars($_GET['LANG']) . "' contains no supported language, defaulting to '$LANG'";
		}
	}
	if (!$quiet) {
		echo("<!-- language negotiation: $msg -->\n");
	}
}

function i18n($text, $return = false) {
	global $LANG;
	$r = $text[$LANG];
	if ($return)
		return ($r);
	else
		echo($r);
}

?>
