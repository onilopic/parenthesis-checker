FROM composer:latest AS composer
FROM php:8.1
COPY --from=composer /usr/bin/composer /usr/bin/composer
WORKDIR /app