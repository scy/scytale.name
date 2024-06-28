GET {{BASE}}/mail
HTTP 301
[Asserts]
header "Location" endsWith "/mail/"

GET {{BASE}}/mail/
HTTP 200
[Asserts]
header "Content-Type" startsWith "text/html"
body contains "<title>Mail Services :: scytale.name</title>"
