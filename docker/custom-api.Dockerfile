FROM php:7.4.3-apache
RUN docker-php-ext-install mysqli
COPY api-custom ./
CMD ["apache2-foreground"]
