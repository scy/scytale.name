# Contains PHP files for remote-include()ing somewhere else. These should
# obviously _not_ be interpreted by my server.

GET {{BASE}}/hax/cat.php
HTTP 200
[Asserts]
header "Content-Type" startsWith "text/plain"
body contains "<?php"
