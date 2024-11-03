#FROM --platform=linux/amd64 dunglas/frankenphp
FROM dunglas/frankenphp

ENV SERVER_NAME="http://"

# add additional extensions here:
RUN install-php-extensions \
    pgsql \
	pdo_pgsql \
	gd \
	intl \
    imap \
    bcmath \
    redis \
    curl \
    exif \
    hash \
    iconv \
    json \
    mbstring \
    pcntl \
    pcre \
    xml \
    libxml \
    zlib \
	zip

RUN apt update && apt install -y supervisor

RUN curl -sS https://getcomposer.org/installer -o composer-setup.php && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    rm composer-setup.php

COPY . /app

COPY .docker/app/php.ini /usr/local/etc/php/
COPY .docker/supervisord/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

WORKDIR /app

RUN composer install --prefer-dist --no-progress --no-interaction

EXPOSE 80 443

CMD ["supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
