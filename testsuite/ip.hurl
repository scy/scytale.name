# Should return the remote IP address. Currently, only returns the Docker host's
# address ... m)

GET {{BASE}}/ip
HTTP 301
[Asserts]
header "Location" endsWith "/ip/"

GET {{BASE}}/ip/
HTTP 200
[Asserts]
header "Content-Type" startsWith "text/plain"
body matches "^([0-9]{1,3}\\.){3}[0-9]{1,3}\n$"
