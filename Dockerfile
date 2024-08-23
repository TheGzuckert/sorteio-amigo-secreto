FROM php:8.1-fpm

# Instale dependências necessárias
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

# Copie o diretório database para o contêiner
COPY ./database /var/www/html/database

# Instale Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Defina o diretório de trabalho
WORKDIR /var/www/html

# Copie o restante do código da aplicação
COPY . .

# Execute o Composer para instalar as dependências do PHP
RUN composer install

# Exponha a porta 9000 e inicie o servidor PHP-FPM
EXPOSE 9000
CMD ["php-fpm"]