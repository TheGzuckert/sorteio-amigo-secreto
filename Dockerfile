FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
  libpng-dev \
  libjpeg-dev \
  libfreetype6-dev \
  libsqlite3-dev \
  libpq-dev \
  zip \
  unzip \
  git \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install gd pdo pdo_mysql pdo_sqlite

COPY ./database /var/www/html/database

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-scripts

EXPOSE 9000
CMD ["php-fpm"]