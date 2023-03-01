FROM php:8.2-fpm
WORKDIR /app

RUN pecl channel-update pecl.php.net \
	&& pecl install xdebug-3.2.0

COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini