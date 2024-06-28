# Make sure .htaccess isn't available. I don't care whether it's a 403 or 404.
GET {{BASE}}/blog/.htaccess
HTTP *
[Asserts]
status >= 403
status <= 404
