FROM php:8.4.19-fpm-alpine3.22

# パッケージリストの更新とアップグレードを追加
RUN apk update && apk upgrade && \
    apk add --no-cache icu-dev libxml2-dev oniguruma-dev \
    && docker-php-ext-install intl pdo_mysql mbstring

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html