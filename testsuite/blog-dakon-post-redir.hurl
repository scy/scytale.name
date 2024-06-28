# Rewrite links to Dakon's articles to his own blog. There's a list of post IDs
# belonging to him, I'm just testing for a single one of these here.
GET {{BASE}}/blog/archives/401-foo
HTTP 302  # This should probably be 301, but it's not configured like that atm.
Location: http://der-dakon.net/blog/s9y/401.html
