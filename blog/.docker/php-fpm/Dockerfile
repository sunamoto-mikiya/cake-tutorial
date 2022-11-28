FROM php:7.4-fpm-buster

RUN apt-get update

RUN apt-get install -y git libzip-dev zip unzip \
    && docker-php-ext-install zip

RUN docker-php-ext-install pdo_mysql

#composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

RUN apt-get install -y libicu-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl

RUN apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd
