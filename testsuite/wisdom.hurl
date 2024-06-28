# Various bits of knowledge.
GET {{BASE}}/wisdom/ssh.txt
HTTP 200
[Asserts]
header "Content-Type" startsWith "text/plain"
body contains "group key"
