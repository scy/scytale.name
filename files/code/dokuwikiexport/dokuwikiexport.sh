#!/bin/sh

export WIKIBASE='http://scytale.de/wiki/' # Base URL to DokuWiki installation
export WIKIFILE='/var/www/scytale.de/htdocs/wiki/data/pages/' # Filesystem path to data/pages/
export WIKIPATH='pub' # Subdirectory to export, leave empty for all.
export WIKIWORK='/tmp/dokuwikiexport' # My working directory.
export STATPREF='/~admin' # Prefix for the static URLs.
export WIKIHEAD='/var/www/scytale.de/res/mathwiki/header' # Will be prepended to each file.
export WIKIFOOT='/var/www/scytale.de/res/mathwiki/footer' # Will be appended to each file.
export DATEFORM='%A, %-d. %B %Y; %X' # Date format for <?dwedatef?>.
export DATELC='de_DE.utf-8' # LC_ALL setting for "date".
export WIKICONT='Inhaltsverzeichnis' # What to replace the small page toc header with.
export REDIRPRE='[[pub:umleitung|Umleitung]] zu:' # The line that denotes a redirection page.
# Leave empty if you don't want to use SCP transfer:
WIKISSHK='/home/scy/.ssh/id_dsa' # SSH key to use.
WIKISSHH='host:/home/public-html/foo' # Target for scp.

# You shouldn't need to edit anything after here.

export WIKIDATA="$WIKIFILE$WIKIPATH"
export INTLPREF="/$(echo "$WIKIBASE" | cut -d '/' -f 4-)$WIKIPATH"

die() {
	echo "$2" >&2
	exit "$1"
}

workonfile() {
	SNAME="$(expr substr "$1" 3 \( \( length "$1" \) - 6 \))"
	OFILE="$WIKIWORK/$SNAME"
	ODIR="$(dirname "$OFILE")"
	[[ -d "$ODIR" ]] || ( mkdir -p "$ODIR" || die 1 "Could not create data directory $ODIR" )
	IURL="${WIKIBASE}doku.php?id=${WIKIPATH}/${SNAME}&do=export_xhtml"
	echo "   $IURL -> $OFILE"
	if [[ "$(head -n 1 $1)" = "$REDIRPRE" ]]; then
		REDIRURL="$(head -n 2 $1 | tail -n 1)"
		echo "RewriteRule ^$SNAME.html$ $REDIRURL [R=permanent]" >> "$WIKIWORK/.htaccess"
		echo "      (will redirect to $REDIRURL)"
	fi
	wget -q -O - "$IURL" | tr '\n' '\t' > "$OFILE.tmp" || die 2 "Could not get $IURL"
	TITLE="$(egrep -o -m 1 '<h1>.+</h1>' "$OFILE.tmp" | cut -d '>' -f 2 | cut -d '<' -f 1)"
	[[ -z "$TITLE" ]] && TITLE='untitled'
	DATE="$(egrep -o -m 1 '<meta name="date" content="[^"]+" />' "$OFILE.tmp" | cut -d '"' -f 4)"
	DATEF="$(echo "$DATE" | tr 'T' ' ' | LC_ALL="$DATELC" date -f - "+$DATEFORM")"
	[[ -z "$DATE" ]] && (DATE='(unknown)'; DATEF="$DATE")
	sed -r 's|^.*(<body>.*</body>).*$|\1| ; s|<a href="([^"]+)"[^>]+>|<a href="\1">|g ; s%(<!--[^>]+-->|<script [^>]+>[^<]+</script>)%%g' "$OFILE.tmp" | sed -r "s|<a href=\"${INTLPREF}([^\"]*)\">|<a href=\"${STATPREF}\1.html\">|g ; s|<div class=\"tocheader\">[^<]*</div>|<div class=\"tocheader\">$WIKICONT</div>|" | tr '\t' '\n' | cat "$WIKIHEAD" - "$WIKIFOOT" 2>/dev/null | sed -r "s|<\?dwetitle\?>|$TITLE| ; s|<\?dwedate\?>|$DATE| ; s|<\?dwedatef\?>|$DATEF|" > "${OFILE}.html"
	rm "$OFILE.tmp"
}

export -f die workonfile

[[ -e "$WIKIWORK" ]] && ( rm -rf "$WIKIWORK" || die 1 "Could not delete my working directory $WIKIWORK" )
mkdir -p "$WIKIWORK" || die 1 "Could not create my working directory $WIKIWORK"

echo -e 'AddDefaultCharset utf-8\n\nRewriteEngine On' > "$WIKIWORK/.htaccess" || die 1 "Could not write to $WIKIWORK/.htaccess"

cd "$WIKIDATA" || die 1 "Could not change to data directory $WIKIDATA"

echo 'Getting files...'
find . -name '*.txt' -exec bash -c "workonfile {}" \;

cd "$WIKIWORK" || die 1 "Could not change to working directory $WIKIWORK"

if [[ ! -z "$WIKISSHK" && ! -z "$WIKISSHH" ]]; then
	echo 'Copying files...'
	scp -rC -i "$WIKISSHK" * .htaccess "$WIKISSHH"
fi
