 FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev zip curl \
    && docker-php-ext-install pdo pdo_mysql zip

RUN a2enmod rewrite

WORKDIR /var/www/html
COPY . .

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

EXPOSE 80