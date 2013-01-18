<html>
<head><title>Night Over-Exposure mass removal tool</title></head>
<body>
<?php

function photos_list($user, $p) {
	$pos = 0;
	foreach ($p as $id=>$r) {
		$pos++;
		if ($pos == 1)
			$o = '';
		elseif ($pos == count($p))
			$o .= ' and ';
		else
			$o .= ', ';
		$o .= "<a href=\"http://www.flickr.com/photos/$user/$id\">$id</a> (".rules_list($r).")";
	}
	return ($o);
}

function rules_list($r) {
	foreach ($r as $num=>$rule) {
		if ($num != 0)
			$o .= ', ';
		$o .= "#$rule";
	}
	return ($o);
}

echo("<p>Please add all the images you want to remove to the following input box, one per line. Start with the URL (cleanup will be done by this tool), then add a space and one or more rules it's breaking, seperated by spaces.</p>\n<p><em>Example:</em></p><p><tt>http://www.flickr.com/photos/scytale/105023265/ 2<br/>http://flickr.com/photos/weirdrubikscube/206654827/in/pool-n-oe 1 3</tt></p>\n");
echo("<p><strong>The <a href='http://www.flickr.com/groups/n-oe/' target='_blank'>rules</a></strong> (reminder): <u>0:</u> exceptions; <u>1:</u> otherworldly; <u>2:</u> EXIF; <u>3:</u> multigroup; <u>4:</u> adminblock; <u>5:</u> banned</p>\n");
echo("<form method='post' action='noe-removal.php'><textarea name='data' rows='15' cols='80'>".htmlentities($_POST['data'])."</textarea><br/><input type='submit' name='send' value='OK'/></form>\n");

if ($_POST['data']) {
	$d = explode("\n", trim($_POST['data']));
	foreach ($d as $l) {
		$ok = preg_match('#http://(www\.)?flickr\.com/photos/([^<>/]+)/([^<>/]+)[^ ]* ([0-9 ]+)#', trim($l), $m);
		if (!$ok) {
			echo("<p style='color:#800;'>Warning: Didn't understand that line: <tt>".htmlentities($l)."</tt></p>\n");
		} else {
			$p[$m[2]][$m[3]] = explode(' ', trim($m[4]));
			$count++;
		}
	}
	if ($count > 0) {
		echo("<hr/>\n");
		echo("<p><strong>Your <a href='http://www.flickr.com/groups/n-oe/discuss/165489/' target='_blank'>log</a> entry:</strong><br/>Removing the following ".(($count>1)?("$count photos"):('photo')).": ");
		$i = 0;
		foreach ($p as $user=>$list) {
			$i++;
			echo(htmlspecialchars(photos_list($user, $list)." from <a href=\"http://www.flickr.com/people/$user\">$user</a>"));
			if ($i < count($p))
				echo('; ');
		}
		echo(".</p>\n");
		foreach ($p as $user=>$list) {
			echo("<hr/><p><strong>Your message to <a href='http://www.flickr.com/people/$user' target='_blank'>$user</a></strong>:<br/><strong>".((count($list)>1)?(count($list).' photos'):('Photo'))." removed from Night Over-Exposure group pool</strong><br/>");
			echo(str_replace("\n", '<br/>', htmlspecialchars("Hi. I've removed ".((count($list)>1)?('some'):('one'))." of your photos from the Night Over-Exposure photo pool. This is not meant to be an offense, but rather an effort to keep the group limited to a specific kind of photos. Following is a list of the photos removed and, in brackets, the group's rule(s) (read them at the group page[1]) it violates (in my opinion):\n".preg_replace('#<a href="(http://[^"]+)">[^<]+</a>#', "\n$1", photos_list($user, $list))."\n\nPlease note that this does not mean that your photos are ugly or not well done, I'm just saying that ".((count($list)>1)?('these particular ones don\'t'):('this one doesn\'t'))." fit into this specific group. Have a look at the other photos at the group pool[2] or the best of[3] to see what Night Over-Exposure is all about. If you have any questions about this removal or think I'm wrong, please contact me or any other administrator[4].\n\nThanks for your understanding.\n\n[1] http://www.flickr.com/groups/n-oe/\n[2] http://www.flickr.com/groups/n-oe/pool/\n[3] http://www.flickr.com/photos/tags/n-oe-bestof/\n[4] http://www.flickr.com/groups_members.gne?id=35432914@N00"))."</p>\n");
		}
	}
}

?>
</body>
</html>