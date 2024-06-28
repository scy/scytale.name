GET {{BASE}}/files
HTTP 301
[Asserts]
header "Location" endsWith "/files/"

# There should be a directory listing.
GET {{BASE}}/files/
HTTP 200
[Asserts]
header "Content-Type" startsWith "text/html"
xpath "count(//a[starts-with(@href,'2020')])" >= 1
xpath "count(//a[starts-with(@href,'adv')])" >= 1
xpath "count(//a[starts-with(@href,'doc')])" >= 1
# There also should be descriptions for some of the directories.
body contains "security advisories"

# The list FAQ uses the normal scytale.name templating system and thus needs to
# be executed as PHP.
GET {{BASE}}/files/doc/list-faq/
HTTP 200
[Asserts]
header "Content-Type" startsWith "text/html"
body contains "<title>Benutzen einer offenen Mailingliste :: scytale.name</title>"

# Apparently there once was my "yearbook" there. There's no user database left,
# so nobody can authenticate.
GET {{BASE}}/files/doc/abi/
HTTP 401

# Some tool I once used to moderate a Flickr group. This should probably be
# executed as PHP.
# TODO: Execute again.
GET {{BASE}}/files/2006/08/noe-removal.php
HTTP 200
[Asserts]
header "Content-Type" startsWith "text/plain"
body contains "<?php"

# This allows HTML injection (for demonstration purposes) and thus should _not_
# be executed.
GET {{BASE}}/files/2006/11/phpsecurity/example2.php
HTTP 200
[Asserts]
header "Content-Type" startsWith "text/plain"
body contains "<?php"

# Some things are just gone.
GET {{BASE}}/files/avatar/
HTTP 410
GET {{BASE}}/files/pim/
HTTP 410
GET {{BASE}}/files/pix/fun/tf2-rl-pyro.png
HTTP 410
GET {{BASE}}/files/code/amazon/
HTTP 410
GET {{BASE}}/files/code/calextract/
HTTP 410
GET {{BASE}}/files/code/frenzy/
HTTP 410
GET {{BASE}}/files/code/p5/
HTTP 410
GET {{BASE}}/files/code/pingbot/
HTTP 410
GET {{BASE}}/files/code/rcal/
HTTP 410
GET {{BASE}}/files/code/retzel/
HTTP 410
GET {{BASE}}/files/code/tagesschau-av500/
HTTP 410
GET {{BASE}}/files/talks/lastfm/
HTTP 404  # TODO: Should be 410, but doesn't work right now.
GET {{BASE}}/files/talks/planung/
HTTP 404  # TODO: Should be 410, but doesn't work right now.
GET {{BASE}}/files/pix/050423a/
HTTP 410
GET {{BASE}}/files/pix/060510b/
HTTP 410
GET {{BASE}}/files/pix/060708a/
HTTP 410
GET {{BASE}}/files/pix/060708b/
HTTP 410

# Talks.

GET {{BASE}}/files/talks/git
HTTP 301
Location: http://scytale.name/git/git-talk/  # TODO: Should instead be https://github.com/scy/git-talk

GET {{BASE}}/files/talks/bash/bash-workshop.tex
HTTP 200
Content-Type: text/x-tex
GET {{BASE}}/files/talks/bash/bash-workshop.txt
HTTP 200
[Asserts]
header "Content-Type" startsWith "text/plain"

HEAD {{BASE}}/files/talks/fs20/fs20-slides-071109.pdf
HTTP 200
Content-Type: application/pdf

HEAD {{BASE}}/files/talks/jabber/jabber-slides-20070525-c3ma.pdf
HTTP 200
Content-Type: application/pdf

HEAD {{BASE}}/files/talks/phpsecurity/phpsecurity.pdf
HTTP 200
Content-Type: application/pdf

GET {{BASE}}/files/talks/tofu/
HTTP 200
[Asserts]
header "Content-Type" startsWith "text/html"
body contains "<title>TOFU-Grillen für Anfänger</title>"

GET {{BASE}}/files/talks/tofu/full.html
HTTP 200
[Asserts]
header "Content-Type" startsWith "text/html"
body contains "Kammquotes"
