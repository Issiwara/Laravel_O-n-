FROM php:8.0.2
RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install pdo_mysql
COPY . /app
WORKDIR /app
RUN composer install

CMD php artisan serve --host=0.0.0.0 --port=3000
EXPOSE 3000
