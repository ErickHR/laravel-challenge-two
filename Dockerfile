FROM ubuntu:latest

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y \
    php-cli \
    php-common \
    php-mbstring \
    php-gd \
    php-intl \
    php-xml \
    php-mysql \
    php-zip \
    php-curl \
    curl \
    unzip \
    git \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

EXPOSE 8000