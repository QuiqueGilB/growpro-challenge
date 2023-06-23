ARG with-dev-experience=0

FROM php:8.2-fpm-alpine3.18 as base
COPY --from=composer:2.1.9 /usr/bin/composer /usr/bin/composer
WORKDIR /app

RUN apk update && apk add --update autoconf g++ make linux-headers

RUN if [[ "${with-dev-experience}" != 0 ]] ; then  \
        pecl install xdebug \
        && docker-php-ext-enable xdebug \
        && { \
          echo xdebug.mode=debug,coverage; \
          echo xdebug.client_host=172.17.0.1; \
          echo xdebug.client_port=9003; \
          echo xdebug.start_with_request=yes; \
          echo xdebug.log=/tmp/xdebug.log; \
        } >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    ; fi


FROM base as final
COPY ../../../.. /app
RUN if [[ "${with-dev-experience}" == 0 ]]; then \
      composer install --no-dev --optimize-autoloader \
    ;else \
      composer install \
    ;fi

RUN if [[ "${with-dev-experience}" != 0 ]] ; then  \
        rm -rf /usr/bin/composer \
    ; fi