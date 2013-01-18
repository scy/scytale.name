<?php

// Whether to convert single newlines to "<br/>" and double (or more) newlines to paragraphs.
// This effectively removes the need for the NL2BR plugin.
define('P_MAGIC', true);
// How to do single line breaks. You most likely won't need to edit this.
define('BREAKSTR', "<br/>\n");

// A list of replacements to make. Keys are regexes, values the replacements.
// If you want certain replacements not to be made, comment them out or delete them.
// If you don't like my HTML style, customize.
$replace = array(
	'\[URL=(.+)](.+)\[/URL]' => '<a href=\'$1\'>$2</a>',
	'\[URL](.+)\[/URL]' => '<a href=\'$1\'>$1</a>',
	'\[I](.+)\[/I]' => '<em>$1</em>',
	'\[B](.+)\[/B]' => '<strong>$1</strong>',
	'\[U](.+)\[/U]' => '<u>$1</u>',
	'\[CODE](.+)\[/CODE]' => '<code>$1</code>',
	'\[IMG](.+)\[/IMG]' => '<img src=\'$1\' alt=\'untitled image\' />',
);

// === YOU SHOULDN'T NEED ANY CUSTOMIZING AFTER HERE. ===

require_once('serendipity_config_local.inc.php');

$db = mysql_connect($serendipity['dbHost'], $serendipity['dbUser'], $serendipity['dbPass']);
if (!$db)
	die('Could not connect to database.');

$ok = mysql_select_db($serendipity['dbName']);
if (!$ok)
	die('Could not USE database.');

$rp = mysql_query('SELECT `id`, `body`, `title`, `exflag` FROM `'.$serendipity['dbPrefix'].'entries`');
if (!$rp)
	die('SELECTing entries failed.');

if ($_SERVER['QUERY_STRING'] != 'go') {
	$go = false;
	echo("<h1>Serendipity BBCode Destroyer -- Test Run</h1>\n");
	echo("<p>This software has been created by Tim \"Scytale\" Weber (<a href='http://scytale.de/ref/bbcd/'>scytale.de</a>). It is public domain.</p>\n");
	echo("<p>Down there you see what will be made of your blog entries. If you like what you're seeing, <a href='".$_SERVER['PHP_SELF']."?go'>start the modification</a>.</p>\n");
} else {
	$go = true;
	echo("<h1>Serendipity BBCode Destroyer -- Modification Run</h1>\n");
	echo("<p>Working...</p>");
	$nopmagic = array();
	$extended = array();
}

while ($row = mysql_fetch_assoc($rp)) {
	$body = trim($row['body']);
	if (!$go) echo("<h2>#".$row['id'].": ".$row['title']."</h2>\n");
	foreach ($replace as $pattern=>$replacement) {
		$body = preg_replace('§'.$pattern.'§DUis', $replacement, $body);
	}
	if (P_MAGIC === true) {
		if (!preg_match('§</?p>§i', $body) && (substr($body, 0, 1) != '<' || preg_match('§^<(a|img) §i', $body))) {
			$body = preg_replace('§\n{3,}§', "\n\n", $body);
			$lines = explode("\n", $body);
			$out = '<p>';
			foreach ($lines as $line) {
				$line = trim($line);
				if ($line == '') {
					$out = substr($out, 0, 0-strlen(BREAKSTR));
					$out .= "</p>\n<p>";
				} else {
					$out .= $line . BREAKSTR;
				}
			}
			$body = substr($out, 0, 0-strlen(BREAKSTR)) . "</p>";
		} else {
			if (!$go) echo("<div style='background-color:#fee;border:1px solid #f77;text-align:center;'><em>&lt;P&gt; magic</em> has been disabled for entry #".$row['id']." because there are &lt;P&gt; tags in there already or it starts with a tag other than A or IMG. Please create &lt;P&gt; tags in this entry <a href='serendipity_admin.php?serendipity[action]=admin&serendipity[adminModule]=entries&serendipity[adminAction]=edit&serendipity[id]=".$row['id']."'>manually</a>.</div>\n");
			else $nopmagic[$row['id']] = $row['title'];
		}
	}
	if ($row['exflag'] == 1) {
		if (!$go) echo("<div style='background-color:#ffe;border:1px solid #ff7;text-align:center;'>This entry has an 'extended' part which you need to <a href='serendipity_admin.php?serendipity[action]=admin&serendipity[adminModule]=entries&serendipity[adminAction]=edit&serendipity[id]=".$row['id']."'>edit manually.</a></div>\n");
		else $extended[$row['id']] = $row['title'];
	}
	$entries[$row['id']] = $body;
	if (!$go) echo("$body\n");
	else {
		$query = mysql_query('UPDATE `'.$serendipity['dbPrefix'].'entries` SET `body`=\''.mysql_real_escape_string($body).'\' WHERE `id`=\''.$row['id'].'\'');
	}
}

if ($go) {
	echo("<p>Done. You may want to <a href='index.php'>have a look at your blog</a>.</p>");
	if (count($nopmagic) > 0) {
		echo("<p><strong>Please create &lt;P&gt; tags manually for the following entries:</strong></p>\n<ul>");
		foreach ($nopmagic as $k=>$v) {
			echo("<li><a href='serendipity_admin.php?serendipity[action]=admin&serendipity[adminModule]=entries&serendipity[adminAction]=edit&serendipity[id]=$k'>#$k: $v</a></li>\n");
		}
		echo("</ul>\n");
	}
	if (count($extended) > 0) {
		echo("<p><strong>Please edit the 'extended' parts of the following entries manually:</strong></p>\n<ul>");
		foreach ($extended as $k=>$v) {
			echo("<li><a href='serendipity_admin.php?serendipity[action]=admin&serendipity[adminModule]=entries&serendipity[adminAction]=edit&serendipity[id]=$k'>#$k: $v</a></li>\n");
		}
		echo("</ul>\n");
	}
}

?>
