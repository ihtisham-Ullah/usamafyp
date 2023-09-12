FROM php:7.3-cli

RUN apt-get update -y && apt-get install -y libmcrypt-dev 

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app
COPY . /app
RUN composer install

EXPOSE 8000
CMD sleep 20 && php artisan cache:clear && php artisan serve --host=0.0.0.0 --port=8000

