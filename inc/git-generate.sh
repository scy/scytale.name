#!/bin/bash
cd /var/www/scytale.name/htdocs/inc
DATA="$(php files-header.php Gitweb)"
(echo "<!--[if IE ]><link rel='stylesheet' type='text/css' href='/style/07/drecksteil.css' /><![endif]-->"; echo "$DATA" | tail -n "+$(echo "$DATA" | grep -n -m 1 LEFTDOTS | cut -d : -f 1)") | sed -r -e 's/( &raquo; )/\1GitWeb/' -e "s/(<div id='MAIN'>)/\\1<div id='GITEMBED'>/" > git-header.html
DATA="$(php files-footer.php Gitweb)"
echo "</div>$DATA" | head -n "$(expr "$(echo "$DATA" | grep -n -m 1 '</body>' | cut -d : -f 1)" - 1 )" > git-footer.html

