# Dockerfile
FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
    libpq-dev zip unzip git \
    && docker-php-ext-install pdo pdo_pgsql

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Opcional: já copia os arquivos (mas o volume vai sobrescrever em dev)
COPY . .

RUN composer install

CMD ["php-fpm"]