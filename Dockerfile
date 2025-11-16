FROM php:8.2-apache

COPY .  /var/www/html

RUN a2enmod rewrite

EXPOSE 10000

CMD ["php", "-S", "0.0.0.0:10000", "-t", "/var/www/html"]
