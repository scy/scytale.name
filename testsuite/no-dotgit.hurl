# .git should not be accessible. I don't care whether it's a 403 or 404.
GET {{BASE}}/.git
HTTP *
[Asserts]
status >= 403
status <= 404
