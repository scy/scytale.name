# WeeChat

## Compiling from source on Uberspace

Here’s how I compiled WeeChat with SSL support on _eridanus.uberspace.de_:

	PYTHON=/usr/bin/python2.6 PKG_CONFIG_PATH="/package/host/localhost/gnutls/lib/pkgconfig" CFLAGS="-I/package/host/localhost/gnutls/include" CPPFLAGS="-I/package/host/localhost/gnutls/include" LDFLAGS="-L/package/host/localhost/gnutls/lib" ./configure --prefix=$HOME/weechat

Source: [Tweet by @ubernauten][https://twitter.com/ubernauten/status/107534749005922304] linking to [a pastie][http://pastie.org/2439992].
