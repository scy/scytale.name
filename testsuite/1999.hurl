# Check that the 1999 homepage is there.

GET {{BASE}}/1999/
HTTP 200
[Asserts]
bytes decode "cp1252" contains "<title>Scytale's Homepage</title>"

GET {{BASE}}/1999/kosovo.html
HTTP 200
[Asserts]
body contains "<P>Fl&uuml;chtlinge in Berlin gelandet</P>"

GET {{BASE}}/1999/main.html
HTTP 200
[Asserts]
body contains "<title>Scytale online - Hauptmen&uuml;</title>"
