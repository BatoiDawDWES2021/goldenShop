FROM php:7.4-fpm-alpine

#Environment variables to configure php

ENV PHP_POST_MAX_SIZE 10M
ENV PHP_VERSION 7.4

ARG XDEBUG_INI=/etc/php/${PHP_VERSION}/mods-available/xdebug.ini

# Copy xdebug configuration for remote debugging

COPY xdebug.ini /etc/php/${PHP_VERSION}/mods-available/xdebug.ini

RUN apk update
RUN apk add libzip-dev
RUN docker-php-ext-install zip
RUN apk add --no-cache $PHPIZE_DEPS
RUN pecl install xdebug-2.9.6
RUN docker-php-ext-enable xdebug
# RUN docker-php-ext-install pdo_mysql
# RUN pecl install xdebug


# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

