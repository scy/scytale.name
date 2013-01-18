<?php
// The following script was quickly coded 2005-10-25 at Chaostreff Mannheim (c3ma.de)
// It is buggy, slow, ugly, but it works, at least at the op3nbox
// (http://www.ito.tu-darmstadt.de/edu/ctf/da.op3n(2005)/setup/)
// set_magic_quotes_runtime didn't work, neither did the javascript, but who cares.
// All code by Tim Weber. Public domain.
// Again: THIS IS NOT HOW TO CODE. :P
set_magic_quotes_runtime(0); ?>
<form action='simplechat.php' method='post'><input type='text' name='nick' size='10' maxlength='10' value='<?php echo(($_REQUEST['nick']=='')?('Nickname'):(htmlentities($_REQUEST['nick']))); ?>' /> <input type='text' name='msg' size='50' maxlength='100' onload='window.focus(this);'/> <input type='submit' /></form>
<?php
preg_match('/[0-9]+$/', $_SERVER['REMOTE_ADDR'], $match);
$text = file_get_contents('/var/www2/simplechat/chat.dat');
if ($_REQUEST['msg'] != '') {
	if (substr($_REQUEST['msg'], 0, 4) == '/me ') {
		$metext=htmlentities(substr($_REQUEST['msg'], 4, 100));
		$saytext='';
	} else {
		$metext='';
		$saytext=htmlentities(substr($_REQUEST['msg'],0,100));
	}
	$text = "<strong style='color:#".substr(md5($_REQUEST['nick']),0,6).";'>".date('Hi.s| ').htmlentities(substr($_REQUEST['nick'],0, 10)).(($metext!='')?(" $metext"):(":"))."</strong> ".(($saytext!='')?($saytext):(''))."<br/>\n".$text;
	$fp = fopen('/var/www2/simplechat/chat.dat', 'w');
	fwrite($fp, $text);
	fclose($fp);
}
echo $text;
?>