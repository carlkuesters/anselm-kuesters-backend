FROM php:7.4.3-apache
RUN docker-php-ext-install mysqli
COPY custom-api ./
CMD ["apache2-foreground"]
