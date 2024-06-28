# Blog homepage.
GET {{BASE}}/blog/
HTTP 200
[Asserts]
body contains "<title>Blog :: scytale.name</title>"
