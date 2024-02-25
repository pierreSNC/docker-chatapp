FROM php:8.2-apache

# PHP
RUN apt-get update && apt-get upgrade
RUN apt-get install -y zlib1g-dev libwebp-dev libpng-dev && docker-php-ext-install gd
RUN apt-get install libzip-dev -y && docker-php-ext-install zip
RUN docker-php-ext-install mysqli pdo_mysql

# Apache
RUN a2enmod rewrite
RUN a2enmod headers
RUN service apache2 restart

COPY . /var/www/html

EXPOSE 80