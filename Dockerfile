FROM php:8.3-fpm

WORKDIR /var/www

COPY . /var/www/

# apt-utils é uma extensão de recursos do gerenciador de pacotes APT
RUN apt-get update -y && apt-get install -y --no-install-recommends \
    apt-utils \
    supervisor \
    libpq-dev 

# Dependências recomendadas de desenvolvimento para ambiente Linux
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    unzip \
    libpng-dev \
    libpq-dev \
    libxml2-dev \
    libbrotli-dev

RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN docker-php-ext-install zip iconv simplexml gd fileinfo
RUN docker-php-ext-install pcntl
RUN docker-php-ext-install soap

# Instalar a extensão do PostgreSQL para o PHP
RUN docker-php-ext-install pdo_pgsql pgsql

# Install Swoole
RUN pecl install swoole --enable-sockets=no --enable-openssl=no --enable-mysqlnd=yes --enable-swoole-curl=no --enable-cares=no --enable-brotli=no --enable-swoole-pgsql=yes --with-swoole-odbc=no --with-swoole-oracle=no --enable-swoole-sqlite=no \
    && docker-php-ext-enable swoole

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./docker/supervisord/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Supervisor permite monitorar e controlar vários processos Linux
COPY ./docker/php/extra-php.ini "$PHP_INI_DIR/99_extra.ini"
COPY ./docker/php/extra-php-fpm.conf /etc/php8/php-fpm.d/www.conf

RUN chown www-data:www-data /var/www

COPY --chown=www-data:www-data ./ .
RUN rm -rf vendor
RUN composer update
RUN composer install --no-interaction

RUN apt-get clean && rm -rf /var/lib/apt/lists/*
RUN apt update -y && apt install nano git -y

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/supervisord.conf"]
