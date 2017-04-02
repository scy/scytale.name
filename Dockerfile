FROM php:5-apache

# That patch is important, because else the RemoveHandler directives in the
# .htaccess files in several directories don't work, leading to the stuff in
# /hax/ being open to the public and other horrific things.
COPY use-addhandler.patch /root

# Patch the default config and enable mod_rewrite.
RUN apt update \
	&& apt install -y \
		patch \
	&& a2enmod rewrite \
	&& patch -d /etc/apache2/conf-available < /root/use-addhandler.patch \
	&& rm /root/use-addhandler.patch \
	&& apt remove -y \
		patch \
	&& rm -rf /var/lib/apt/lists/*

# Currently, the repository is the webroot. (Which is bad, I know.) Therefore,
# copy the whole repo (except for the things in .dockerignore) to the root.
COPY . /var/www/html

# Move php.ini to the correct spot, set permissions for the web content, restore
# the timestamps from the backup file and get rid of the patch file which was
# already applied (but copied again nevertheless).
RUN mv /var/www/html/php.ini /usr/local/etc/php \
	&& chown -R www-data:www-data /var/www/html \
	&& (cd /var/www/html/blog && while read -r ts file; do touch -d "@$ts" "$file"; done) <blog/timestamps.txt \
	&& rm use-addhandler.patch blog/timestamps.txt
