# /doc/* has moved to /files/doc/*.
GET {{BASE}}/doc/thesis/forscript.pdf
HTTP 301
[Asserts]
header "Location" endsWith "/files/doc/thesis/forscript.pdf"
