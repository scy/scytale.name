# Rewrite old Serendipity links to their subdirectory.
GET {{BASE}}/blog/archives/123-foo
HTTP 301
[Asserts]
header "Location" endsWith "/blog/s9y/123"
