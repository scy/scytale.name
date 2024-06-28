# Redirects pointing to me on different services.

GET {{BASE}}/on/twitter
HTTP 302  # TODO: This should probably be 410.
Location: http://twitter.com/scy

GET {{BASE}}/on/g+
HTTP 302  # TODO: This should be 410.
Location: https://plus.google.com/109150254638842206625/about
GET {{BASE}}/on/googleplus
HTTP 302  # TODO: This should be 410.
Location: https://plus.google.com/109150254638842206625/about

GET {{BASE}}/on/fb
HTTP 302  # TODO: This should be 410.
Location: http://www.facebook.com/Scy83
GET {{BASE}}/on/facebook
HTTP 302  # TODO: This should be 410.
Location: http://www.facebook.com/Scy83

GET {{BASE}}/on/fs
HTTP 302  # TODO: This should be 410.
Location: http://www.formspring.me/Scytale
GET {{BASE}}/on/formspring
HTTP 302  # TODO: This should be 410.
Location: http://www.formspring.me/Scytale

GET {{BASE}}/on/spotify
HTTP 302  # TODO: This should be 410.
Location: http://open.spotify.com/user/1121729483

GET {{BASE}}/on/okcupid
HTTP 302  # TODO: This should be 410.
Location: http://www.okcupid.com/profile/Scy83

GET {{BASE}}/on/github
HTTP 302
Location: https://github.com/scy

GET {{BASE}}/on/gc
HTTP 302
Location: http://www.geocaching.com/profile/?guid=99cf6bdb-6d6e-4f97-a31f-b6646742fc1b
GET {{BASE}}/on/geocaching
HTTP 302
Location: http://www.geocaching.com/profile/?guid=99cf6bdb-6d6e-4f97-a31f-b6646742fc1b

GET {{BASE}}/on/spot
HTTP 302  # TODO: This should be 410.
Location: http://share.findmespot.com/shared/faces/viewspots.jsp?glId=0sde82g5P2C6TuzSfmxsfvLZddTVpHlkN

GET {{BASE}}/on/
HTTP 302
Location: http://scytale.name/
