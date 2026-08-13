FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    unzip git curl libzip-dev default-mysql-client \
    && docker-php-ext-install pdo pdo_mysql zip

# RUN apt-get update && apt-get install -y \
#     libzip-dev \
#     zip \
#     unzip \
#     git \
#     curl \
#     libonig-dev \
#     libxml2-dev \
#     libpq-dev \
#     && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . /var/www/

RUN composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader
RUN composer require laravel/sanctum
RUN composer dump-autoload

COPY ./docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["php-fpm", "-F"]
