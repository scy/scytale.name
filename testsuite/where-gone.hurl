# No idea what once lived at /where/*, but I explicitly created a rule that it's
# gone now.

GET {{BASE}}/where
HTTP 410

GET {{BASE}}/where/foo
HTTP 410
