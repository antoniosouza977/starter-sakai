FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip pdo_mysql pcntl

RUN docker-php-ext-configure pcntl --enable-pcntl

RUN apt install libicu-dev -y
RUN docker-php-ext-install intl
RUN docker-php-ext-enable intl

RUN pecl install xdebug pcov \
    && docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./docker/scripts/install-app.sh /usr/local/bin/install-app
COPY ./docker/php/xdebug.ini /etc/php/8.3/mods-available/xdebug.ini


EXPOSE 9000

CMD ["/usr/local/bin/install-app"]
