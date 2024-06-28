# Redirect root to blog.
GET {{BASE}}/
HTTP 302
[Asserts]
header "Location" endsWith "/blog/"
