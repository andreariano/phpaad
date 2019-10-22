FROM php:7.2-apache

COPY src/ /var/www/html/

WORKDIR /var/www/html

# RUN apt-get update && \
#     apt-get install git -y && \
#     curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update && \
    apt-get install zip -y && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer require magium/active-directory && \
    composer install