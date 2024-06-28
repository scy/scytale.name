# Contact page.

GET {{BASE}}/contact
HTTP 301
[Asserts]
header "Location" endsWith "/contact/"

GET {{BASE}}/contact/
HTTP 200
[Asserts]
body contains "<title>Contact :: scytale.name</title>"
