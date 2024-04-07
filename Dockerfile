FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Instala Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

WORKDIR /app

COPY . .

RUN composer install
RUN composer require darkaonline/l5-swagger
RUN composer require zircote/swagger-php
RUN php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"
RUN php artisan l5-swagger:generate


COPY ./scripts/entrypoint.sh /scripts/

RUN chmod +x /scripts/entrypoint.sh
RUN apt-get install -y dos2unix
RUN dos2unix /scripts/entrypoint.sh

CMD ["sh", "/scripts/entrypoint.sh"]
