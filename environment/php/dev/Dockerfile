FROM php:7.4-fpm

ARG TIMEZONE

RUN apt-get update && apt-get install --no-install-recommends -y \
    openssl \
    git \
    unzip \
    curl \
    zsh \
    wget \
    procps \
    net-tools \
    iproute2 \
    xauth \
    iputils-ping \
    telnet

# Install Oh My Zsh
RUN wget https://raw.githubusercontent.com/ohmyzsh/ohmyzsh/master/tools/install.sh -O - | zsh || true

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --version

# Set timezone
RUN rm /etc/localtime
RUN ln -snf /usr/share/zoneinfo/${TIMEZONE} /etc/localtime && echo ${TIMEZONE} > /etc/timezone \
&& printf '[PHP]\ndate.timezone = "%s"\n', ${TIMEZONE} > /usr/local/etc/php/conf.d/tzone.ini \
&& "date"

# Install xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug
COPY ./xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

WORKDIR /var/www/app

CMD ["php-fpm", "-F"]