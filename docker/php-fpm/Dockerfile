FROM php:7.4-fpm

COPY . /var/www/html
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libpng-dev \
    libpq-dev \
    libonig-dev \
    libxml2-dev \
    git \
    cron \
    && git clone https://github.com/phpredis/phpredis.git /usr/src/php/ext/redis \
    && docker-php-ext-install -j$(nproc) zip gd pdo_pgsql redis \
    && docker-php-ext-enable zip gd pdo_pgsql redis

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

WORKDIR /var/www/html