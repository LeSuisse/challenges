FROM php:5.6-apache

RUN docker-php-ext-configure pdo && \
    docker-php-ext-install pdo && \
    docker-php-ext-configure pdo_mysql &&  \
    docker-php-ext-install pdo_mysql

RUN a2enmod rewrite && a2enmod headers
