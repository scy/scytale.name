GET {{BASE}}/wish
HTTP 301
[Asserts]
header "Location" endsWith "/wish/"

GET {{BASE}}/wish/
HTTP 200
[Asserts]
header "Content-Type" startsWith "text/html"
body contains "<title>Wishlist :: scytale.name</title>"
