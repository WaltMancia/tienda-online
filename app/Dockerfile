FROM php:8.2-fpm-alpine

# Instalamos extensiones y dependencias necesarias
RUN apk add --no-cache \
    mysql-client \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    zlib-dev \
    oniguruma-dev \
    autoconf \
    gcc \
    g++ \
    make \
    bash \
    && docker-php-ext-install \
        mysqli \
        pdo_mysql \
        gd \
        zip

# Copiamos configuración PHP personalizada
COPY php.ini /usr/local/etc/php/conf.d/custom-php.ini

EXPOSE 9000
WORKDIR /var/www/html
