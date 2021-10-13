FROM php:8.0.5-fpm-alpine
WORKDIR /home/lazy_dev_weather
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
