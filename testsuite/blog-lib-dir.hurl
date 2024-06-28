# qb is installed in lib/, make sure it can't be accessed from outside. I don't
# care whether it's a 403 or 404.
GET {{BASE}}/blog/lib/qb.php
HTTP *
[Asserts]
status >= 403
status <= 404
