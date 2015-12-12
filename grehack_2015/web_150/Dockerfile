FROM php:5.6-apache

VOLUME ["/var/lock/apache2", "/var/run/apache2"]

COPY src/ /var/www/html/

RUN a2enmod rewrite && a2enmod headers
