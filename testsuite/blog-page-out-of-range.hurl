# Requesting a non-existing page returns "no such article", but doesn't set the
# status to 404.
GET {{BASE}}/blog/2008?5
HTTP 200
[Asserts]
body contains "[&nbsp;5&nbsp;/&nbsp;3&nbsp;]"
body contains "<p class='error'>No such article.</p>"
