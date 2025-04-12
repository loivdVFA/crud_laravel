# Stage 1: Composer
FROM composer:2 AS composer

# Stage 2: Laravel App
FROM php:8.2-alpine AS build

RUN apk update && apk upgrade --no-cache
RUN apk add --no-cache \
    bash git curl unzip \
    libpng-dev libjpeg-turbo-dev libzip-dev oniguruma-dev

RUN docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
# COPY . .

RUN composer install --optimize-autoloader --no-dev \
 && php artisan config:cache 
 
EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
