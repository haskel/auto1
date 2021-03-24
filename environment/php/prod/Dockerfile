FROM php:7.4-fpm-alpine

RUN apk update \
 && apk add --no-cache $PHPIZE_DEPS \
    git \
    zip \
    unzip \
 && docker-php-ext-install \
    opcache \
 && docker-php-ext-enable \
    opcache \
 && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
 && rm -rf \
    /var/cache/apk/* \
    /var/lib/apt/lists/*

COPY environment/php/prod/php.ini /usr/local/etc/php/conf.d/php.override.ini
COPY environment/php/prod/opcache.ini /usr/local/etc/php/conf.d/opcache.ini
COPY environment/php/prod/fpm.conf /usr/local/etc/php-fpm.d/www.conf

COPY . /var/www/app

WORKDIR /var/www/app

RUN set -xe \
 && composer install --no-dev --no-scripts --no-interaction --prefer-dist --optimize-autoloader \
 && composer dump-autoload --no-dev --optimize --classmap-authoritative
RUN bin/console cache:clear
RUN bin/console cache:warm

CMD ["php-fpm", "--nodaemonize"]
