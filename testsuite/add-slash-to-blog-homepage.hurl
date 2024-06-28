# Add slash to blog homepage.
GET {{BASE}}/blog
HTTP 301
[Asserts]
header "Location" endsWith "/blog/"
