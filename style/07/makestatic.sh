#!/bin/sh

COLORS='
blog#30f298
proj#e9f230
files#f29830
wish#e62edc
contact#2e56e6
'

LINK='#61f2ae'
ALINK='#00f281'
ALINK='#fff'

FILES='#f2ae61'
PROJ='#ebf261'
CONTACT='#5c7ae6'

COLORS="
blog$LINK
proj$PROJ
files$FILES
wish#e65cdf
contact$CONTACT
"
README="/* Don't edit this file directly, use $(basename "$0") instead. */"

cat > default.css <<EOF
$README

html, body {
	color: #ccc;
}

p, dd {
	margin-top:0.3em;
	margin-bottom:1em;
}

pre {
	overflow:auto;
	padding:0em;
	margin:1em 2em;
}

blockquote {
	font-style:italic;
	border-left:3px solid #666;
	padding:1em 1em 1em 1.5em;
	background-color:#282828;
}

div.bigimg {
	text-align:center;
}

div.bigimg img {
	border:1px solid #333;
}

div.info {
	border:1px solid #666;
	background-color:#333;
	padding:1em;
	margin:1em;
}

div.info p {
	margin:0.5em;
}

img, div#MENUCONNECT img {
	border:0px;
	margin:0px;
	padding:0px;
}

h1, h2 {
	padding:0.2em 0.5em;
}

h1 {
	margin-top:0em;
	text-align:right;
}

h2 {
	margin-bottom:0.5em;
	margin-top:1em;
	background-color:#444;
}

h2 a {
	color:#fff;
	text-decoration:none;
}

a {
	color:$LINK;
	text-decoration:underline;
}

a:hover, a:active, div#FOOT a:hover, div#FOOT a:active {
	color:$ALINK;
}

q {
	font-style:italic;
}

div.via, div.date, div.tags {
	text-align:right;
	font-size:75%;
	color:#888;
}

span.label {
	font-weight:bold;
	color:#aaa;
}

span.tag {
	margin-left:0.8em;
}

div#LEFT {
	position:fixed;
	left:1em;
	top:0em;
	width:12.5em;
	height:auto;
	overflow:auto;
	font-variant:small-caps;
	font-weight:bold;
}

div#RIGHT {
	position:fixed;
	top:3px;
	right:3px;
}

div#AVATAR {
	border:1px solid #333;
	padding:1px;
}

div#LEFT a {
	text-decoration:none;
	color:#000;
}

div#LEFT a:hover {
	text-decoration:underline;
}

div#RIGHTDOTS {
	margin-left:12.5em;
	margin-right:20px;
	padding-right:40px;
	background-color:#000;
	background-image:url(dots-right.png);
	background-repeat:repeat-y;
	background-position:right;
}

div#LEFTDOTS {
	padding:1em 15px 1em 55px;
	background-color:#222;
	background-image:url(dots-left.png);
	background-repeat:repeat-y;
	background-position:left;
}

div#SITENAME, div#MENUCONNECT {
	font-size:130%;
	font-weight:bold;
	letter-spacing:0.2em;
	text-align:center;
}

div#MENUCONNECT, div#RIGHT {
	padding:0em;
	margin:0em;
}

div#SITENAME, div#MENU {
	background-color:#333;
	border:1px solid #666;
}

div#SITENAME {
	padding-top:1em;
	border-top:none;
}

div#MENU ul {
	list-style:none;
	margin:0em;
	padding:0em;
}

div#MENU a {
	display:block;
	padding:0em 0.3em;
	background-image:url(buttonbg-.png);
	background-repeat:repeat-x;
	background-position:bottom;
}

div#MENU li li a {
	background:none;
	padding:0em 0.6em;
	color:#ccc;
}

div#MENU li li a:hover {
	color:#fff;
}

div#FOOT {
	text-align:center;
	font-size:80%;
	background-color:#111;
	border-top:1px solid #333;
	border-bottom:1px solid #333;
	margin-top:2em;
}

div#FOOT a {
	text-decoration:none;
	color:$CONTACT;
}

div#GITEMBED {
	background-color:#fff;
	margin:0em;
	padding:0.5em;
	color:#000;
	overflow:auto;
}

div.pagenav {
	text-align:center;
	font-size:85%;
}

body.files a {
	color:$FILES;
}

/* Needed for Gitweb embedding: We can't modify the <body> tag. */
div#SITENAME.Gitweb a {
	color:$PROJ;
}
h1.Gitweb {
	color:#fff;
	border-bottom:3px solid $PROJ;
}

EOF


cat > drecksteil.css <<EOF
$README

div#LEFT, div#RIGHT {
	position:absolute;
}

div#MENU a {
	background-image:none;
}

div#GITEMBED {
	width:100%;
	overflow:scroll;
}

EOF


convert \
	\( -size  1x8 gradient:#ffffff00-#ffffff55 \) \
	\( -size 1x10 gradient:#ffffff55-#ffffff00 \) \
	\( -size  1x3 gradient:#00000000-#00000033 \) \
	-append \
	buttonbg-.png

for side in left right; do
	convert \
		\( -size 2x200 xc:#ffffff +noise random -channel G -threshold 10% -separate +channel \) \
		\( -size 2x200 xc:#ffffff +noise random -channel G -threshold 25% -separate +channel \) \
		\( -size 2x200 xc:#ffffff +noise random -channel G -threshold 75% -separate +channel \) \
		\( -size 2x200 xc:#ffffff +noise random -channel G -threshold 98% -separate +channel \) \
		+append \
		\( -size 8x200 pattern:gray75 -transparent black \) \
		-composite \
		-fill '#222' -opaque black \
		-fill black -opaque white \
		\( -size 200x8 gradient:#00000000-#00000088 -rotate 90 \) \
		-composite \
		$([[ "$side" == 'right' ]] && echo -flop) \
		-filter point -resize 500% \
		"dots-$side.png"
done
	

for X in blog proj files wish contact; do
	COLOR="#$(echo "$COLORS" | grep "^$X#" | cut -d '#' -f 2)"
	cat >> default.css <<EOF
a.$X {
	color:$COLOR;
}

body.$X div#SITENAME a {
	color:$COLOR;
}

body.$X h1 {
	color:#fff;
	border-bottom:3px solid $COLOR;
}

body.$X h2 {
	border-left:2px solid $COLOR;
}

div#MENU a.$X {
	background-color:$COLOR;
}
EOF
	convert -background "$COLOR" buttonbg-.png -flatten "buttonbg-$X.png"
	cat >> drecksteil.css <<EOF
div#MENU a.$X {
	background-image:url(buttonbg-$X.png);
}
EOF
done
