FROM composer:2.5.4 as build
WORKDIR /app
COPY . /app
RUN composer update

FROM php:8.1-apache
RUN docker-php-ext-install pdo pdo_mysql

EXPOSE 8080
COPY --from=build /app /var/www/
COPY docker/default.conf /etc/apache2/sites-available/default.conf
# COPY .env /var/www/.env
RUN chmod 777 -R /var/www/storage/ && \
    echo "Listen 8080" >> /etc/apache2/ports.conf && \
    chown -R www-data:www-data /var/www/ && \
    a2enmod rewrite