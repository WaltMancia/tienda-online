# Usamos una imagen base de PHP 8.2 con FPM (FastCGI Process Manager)
FROM php:8.2-fpm-alpine

# Instalamos extensiones de PHP necesarias
RUN apk add --no-cache \
    # Extensión para conectar con MySQL
    mysql-client \
    # Herramientas para la instalación de dependencias
    libpng \
    libjpeg-turbo \
    libzip \
    && docker-php-ext-install \
    # Instalamos la extensión mysqli para la base de datos
    mysqli \
    # Instalamos la extensión pdo_mysql para la base de datos
    pdo_mysql \
    # Instalamos la extensión para procesar imágenes
    gd \
    # Instalamos la extensión para manejar archivos ZIP
    zip

# Copiamos nuestro archivo de configuración de PHP al contenedor
COPY php.ini /usr/local/etc/php/conf.d/custom-php.ini

# Exponemos el puerto 9000 para que Nginx se pueda comunicar con PHP-FPM
EXPOSE 9000

# Directorio de trabajo
WORKDIR /var/www/html
