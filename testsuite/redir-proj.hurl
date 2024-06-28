# Some projects simply redirect to GitHub.
GET {{BASE}}/proj/dretweet
HTTP 302
Location: http://github.com/scy/dretweet
GET {{BASE}}/proj/emit
HTTP 302
Location: http://github.com/scy/emit
GET {{BASE}}/proj/fmenu
HTTP 302
Location: http://github.com/scy/fmenu
GET {{BASE}}/proj/levitation
HTTP 302
Location: http://github.com/scy/levitation
GET {{BASE}}/proj/overlay
HTTP 302
Location: http://github.com/scy/overlay
GET {{BASE}}/proj/tweethub
HTTP 302
Location: http://github.com/scy/tweethub

GET {{BASE}}/proj
HTTP 301
[Asserts]
header "Location" endsWith "/proj/"

GET {{BASE}}/proj/
HTTP 200
[Asserts]
body contains "<title>Projects :: scytale.name</title>"

GET {{BASE}}/proj/forscript
HTTP 301
[Asserts]
header "Location" endsWith "/proj/forscript/"

GET {{BASE}}/proj/forscript/
HTTP 200
[Asserts]
body contains "<title>forscript :: scytale.name</title>"

GET {{BASE}}/proj/qb
HTTP 301
[Asserts]
header "Location" endsWith "/proj/qb/"

GET {{BASE}}/proj/qb/
HTTP 200
[Asserts]
body contains "<h2>Getting qb</h2>"

GET {{BASE}}/proj/twarph
HTTP 301
[Asserts]
header "Location" endsWith "/proj/twarph/"

GET {{BASE}}/proj/twarph/
HTTP 200
[Asserts]
body contains "Windows Mobile"

# TODO: /proj/oipd13 is currently broken.
