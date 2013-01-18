<?php
  $qString = strtolower($_SERVER['QUERY_STRING']);
  $pString = array('chr(', 'chr=', 'chr%20', '%20chr', 'wget%20', '%20wget', 'wget(',
 			             'cmd=', '%20cmd', 'cmd%20', 'rush=', '%20rush', 'rush%20',
                   'union%20', '%20union', 'union(', 'union=', 'echr(', '%20echr', 'echr%20', 'echr=',
                   'esystem(', 'esystem%20', 'cp%20', '%20cp', 'cp(', 'mdir%20', '%20mdir', 'mdir(',
                   'mcd%20', 'mrd%20', 'rm%20', '%20mcd', '%20mrd', '%20rm',
                   'mcd(', 'mrd(', 'rm(', 'mcd=', 'mrd=', 'mv%20', 'rmdir%20', 'mv(', 'rmdir(',
                   'chmod(', 'chmod%20', '%20chmod', 'chmod(', 'chmod=', 'chown%20', 'chgrp%20', 'chown(', 'chgrp(',
                   'locate%20', 'grep%20', 'locate(', 'grep(', 'diff%20', 'kill%20', 'kill(', 'killall',
                   'passwd%20', '%20passwd', 'passwd(', 'telnet%20', 'vi(', 'vi%20',
                   'insert%20into', 'select%20', 'nigga(', '%20nigga', 'nigga%20', 'fopen', 'fwrite', '%20like', 'like%20',
                   '$_request', '$_get', '$request', '$get', '.system', 'HTTP_PHP', '&aim', '%20getenv', 'getenv%20',
                   'new_password', '&icq','/etc/password','/etc/shadow', '/etc/groups', '/etc/gshadow',
                   'HTTP_USER_AGENT', 'HTTP_HOST', '/bin/ps', 'wget%20', 'uname\x20-a', '/usr/bin/id',
                   '/bin/echo', '/bin/kill', '/bin/', '/chgrp', '/chown', '/usr/bin', 'g\+\+', 'bin/python',
                   'bin/tclsh', 'bin/nasm', 'perl%20', 'traceroute%20', 'ping%20', '.pl', '/usr/X11R6/bin/xterm', 'lsof%20',
                   '/bin/mail', '.conf', 'motd%20', 'HTTP/1.', '.inc.php', 'config.php', 'cgi-', '.eml',
                   'file\://', 'window.open', '<SCRIPT>', 'javascript\://','img src', 'img%20src','.jsp','ftp.exe',
                   'xp_enumdsn', 'xp_availablemedia', 'xp_filelist', 'xp_cmdshell', 'nc.exe', '.htpasswd',
                   'servlet', '/etc/passwd', 'wwwacl', '~root', '~ftp', '.js', '.jsp', 'admin_', '.history',
                   'bash_history', '.bash_history', '~nobody', 'server-info', 'server-status', 'reboot%20', 'halt%20',
                   'powerdown%20', '/home/ftp', '/home/www', 'secure_site, ok', 'chunked', 'org.apache', '/servlet/con',
                   '<script', '/robot.txt' ,'/perl' ,'mod_gzip_status', 'db_mysql.inc', '.inc', 'select%20from',
                   'select from', 'select+from', 'drop%20', '.system', 'getenv', 'http_', '_php', 'php_', 'phpinfo()', '<?php',
                   '?>', 'sql=', 'union+select', 'union select', 'union', 'select');

  $check = str_replace($pString, '*', $qString);

  if($qString != $check)
  {
    $cr = $_SERVER['REMOTE_ADDR'];
    $cu = $_SERVER['HTTP_USER_AGENT'];
    $sp = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

    die( "<center><font color=\"red\" size=\"6\"><b>Attack detected!</b></font></center><br>".$sp."<b>Dieser Angriff wurde 
          erkannt und blockiert:</b><br>".$sp.$cr." - ".$cu."<br><br><center>Die Verbindung zur Datenbank wurde aus 
          Sicherheitsgr&uuml;nden unterbrochen und der Administrator benachrichtigt!</center>");
  }
  
function safe()
{
  if(!get_magic_quotes_gpc()) 
  {
    for(reset($_GET); list($k, $v) = each($_GET);)            
      $_GET[$k] = addslashes($v);        
    for(reset($_POST); list($k, $v) = each($_POST);)            
      $_POST[$k] = addslashes($v);   
    for(reset($_COOKIE); list($k, $v) = each($_COOKIE);)            
    $_COOKIE[$k] = addslashes($v);    
  }
}
?>