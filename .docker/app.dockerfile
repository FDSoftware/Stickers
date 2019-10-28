FROM php:7.2-apache

ENV DEBIAN_FRONTEND noninteractive
RUN apt-get update
RUN apt-get upgrade  -y
RUN apt-get install -y libpng-dev zlib1g-dev 
RUN docker-php-ext-install pdo pdo_mysql mysqli 
RUN a2enmod rewrite

RUN docker-php-ext-install mbstring

#RUN docker-php-ext-install zip

RUN docker-php-ext-install gd

COPY ./.docker/vhost.conf /etc/apache2/sites-available/000-default.conf