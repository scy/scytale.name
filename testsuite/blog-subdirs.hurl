# Filtering by year. Note that this does not add a slash.
GET {{BASE}}/blog/2008
HTTP 200
[Captures]
page1: body
[Asserts]
body contains "[&nbsp;1&nbsp;/&nbsp;3&nbsp;]"

# Requesting the same page returns the same body.
GET {{BASE}}/blog/2008?1
HTTP 200
[Asserts]
body == "{{page1}}"

# Even when adding a slash.
GET {{BASE}}/blog/2008/?1
HTTP 200
[Asserts]
body == "{{page1}}"

# Requesting a different page returns a different body.
GET {{BASE}}/blog/2008?2
HTTP 200
[Asserts]
body != "{{page1}}"
