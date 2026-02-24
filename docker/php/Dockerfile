FROM php:8.3-fpm

# Install required system libs and PDO MySQL
RUN apt-get update && apt-get install -y \
    default-mysql-client libmariadb-dev-compat libmariadb-dev \
    git unzip libzip-dev libicu-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql

# Add composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
