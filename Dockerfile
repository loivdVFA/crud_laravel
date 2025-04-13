FROM php:8.2-alpine

RUN apk update && apk upgrade --no-cache && apk add --no-cache \
    bash git curl unzip \
    libpng-dev libjpeg-turbo-dev libzip-dev oniguruma-dev icu-dev zlib-dev \
    php82-pecl-xdebug \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath intl

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /crud_laravel

COPY . .

RUN composer install --no-dev --no-interaction --optimize-autoloader

# Tạo các thư mục cần thiết và đặt quyền ghi cho storage và bootstrap/cache
RUN mkdir -p storage/framework/cache/data && \
    chmod -R 777 storage bootstrap/cache

EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
