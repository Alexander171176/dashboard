FROM php:8.1-fpm-alpine

# Устанавливаем рабочую директорию
WORKDIR /var/www

# Устанавливаем зависимости
FROM php:8.1-fpm-alpine

# Устанавливаем рабочую директорию
WORKDIR /var/www

# Устанавливаем зависимости
RUN apk --update add wget \
    curl \
    build-base \
    libmemcached-dev \
    libmcrypt-dev \
    libxml2-dev \
    pcre-dev \
    zlib-dev \
    autoconf \
    cyrus-sasl-dev \
    libgsasl-dev \
    oniguruma-dev \
    openssl \
    openssl-dev \
    postgresql-dev

# Устанавливаем расширения PHP
RUN docker-php-ext-install pdo_pgsql pcntl exif

# Копируем конфигурацию PHP
COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/php.ini

# Устанавливаем Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename composer

# Очищаем кеш пакетного менеджера
RUN rm -rf /var/cache/apk/*

# Портим экосистему, чтобы создать образ нормального размера
RUN rm -rf /usr/share/php8


# Устанавливаем расширения PHP
RUN docker-php-ext-install pdo_pgsql pcntl exif

# Копируем конфигурацию PHP
COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/php.ini

# Устанавливаем Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename composer

# Очищаем кеш пакетного менеджера
RUN rm -rf /var/cache/apk/*

# Портим экосистему, чтобы создать образ нормального размера
RUN rm -rf /usr/share/php8
