FROM php:7.1-fpm

# Install recommended extensions for Symfony
RUN apt-get update
RUN apt-get install -y libicu-dev zlib1g-dev mysql-client git
RUN docker-php-ext-install intl opcache zip
RUN docker-php-ext-enable intl opcache zip
RUN docker-php-ext-install pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -sL https://deb.nodesource.com/setup_8.x | bash -
RUN apt-get install -y nodejs

# Permission fix
RUN usermod -u 1002 www-data