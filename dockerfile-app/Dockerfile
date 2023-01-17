FROM php:fpm-alpine

WORKDIR /app

RUN set -ex \
  && apk --no-cache add \
    postgresql-dev

COPY app.php .

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pgsql pdo_pgsql

CMD [ "php", "-S", "0.0.0.0:8000", "./app.php" ]