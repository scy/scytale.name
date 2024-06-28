# Raw qb source files can be requested.
GET {{BASE}}/blog/src/2007/02/26/krater.qb
HTTP 200
[Asserts]
header "Content-Type" startsWith "text/plain"
body startsWith "<:Und die Erde tat sich auf...><tags:news fefe wtf guatemala catastrophe hole crater link><via:<<http://blog.fefe.de/?ts=bb1c1c4a Fefe's Blog>>>"
