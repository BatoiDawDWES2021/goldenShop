FROM php:7.4-fpm-alpine

#Environment variables to configure php

ENV PHP_POST_MAX_SIZE 10M
ENV PHP_VERSION 7.4

ARG XDEBUG_INI=/etc/php/${PHP_VERSION}/mods-available/xdebug.ini

# Copy xdebug configuration for remote debugging

COPY ./mods-available/xdebug.ini /etc/php/${PHP_VERSION}/mods-available/xdebug.ini

RUN apk update && \
     apk add libzip-dev \
         && docker-php-ext-install zip pdo pdo_mysql


# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
