FROM php:8.3-fpm-alpine
LABEL maintainer="Rodrigo Serrano <contato.rodrigo.serrano@gmail.com>"

RUN addgroup -g 1000 php && adduser -G php -g php -s /bin/sh -D php

RUN mkdir -p /var/www/html

ADD ./src/ /var/www/html

RUN apk add --no-cache \
    libpq-dev \
    oniguruma-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring \
    && docker-php-ext-configure pcntl --enable-pcntl \
    && docker-php-ext-install pcntl

RUN chown -R php:php /var/www/html

#ENTRYPOINT ["top", "-b"]