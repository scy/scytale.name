# Contains files to be included on the server side, but past me was fine with
# returning them to nosy browsers as well.

# TODO: Not sure whether these should be returned as source code, or run.
# Currently, the PHP files are being run.

GET {{BASE}}/inc/scytale.name.php
HTTP 200
[Asserts]
header "Content-Type" startsWith "text/html"
body == ""

GET {{BASE}}/inc/files-header.php
HTTP 200
[Asserts]
header "Content-Type" startsWith "text/html"
body contains "<title>/inc/files-header.php :: scytale.name</title>"

GET {{BASE}}/inc/files-footer.php
HTTP 200
[Asserts]
header "Content-Type" startsWith "text/html"
body contains "<var class='sn host'>scytale.name</var>"

GET {{BASE}}/inc/git-generate.sh
HTTP 200
[Asserts]
header "Content-Type" startsWith "text/x-sh"
body startsWith "#!/bin/bash"
