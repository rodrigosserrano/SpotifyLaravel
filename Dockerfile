FROM php:8.2-fpm-alpine
LABEL maintainer="Rodrigo Serrano <contato.rodrigo.serrano@gmail.com>"

#ADD ./nginx/conf.d/app.conf /usr/local/etc/php-fpm.d/app.conf

RUN addgroup -g 1000 laravel && adduser -G laravel -g laravel -s /bin/sh -D laravel

RUN mkdir -p /var/www/html

ADD ./src/ /var/www/html

RUN apk add --no-cache \
    libpq-dev \
    oniguruma-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring

RUN chown -R laravel:laravel /var/www/html

#ENTRYPOINT ["top", "-b"]