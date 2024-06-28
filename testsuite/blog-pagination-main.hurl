# Page 2 of the blog index.
GET {{BASE}}/blog/?2
HTTP 200
[Captures]
page2: body
[Asserts]
body contains "[&nbsp;2&nbsp;/&nbsp;"

# Requesting the same page returns the same body.
GET {{BASE}}/blog/?2
HTTP 200
[Asserts]
body == "{{page2}}"

# Requesting a different page returns a different body.
GET {{BASE}}/blog/?3
HTTP 200
[Asserts]
body != "{{page2}}"
