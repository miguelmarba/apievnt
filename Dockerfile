FROM php:8.2-apache

# Install system dependencies
RUN  apt-get update &&\
    apt-get install -y

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extentions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip soap

# Virtual Host
RUN mkdir /var/www/logs/
COPY ./vh-local.conf /etc/apache2/sites-available/vh-local.conf
RUN a2enmod rewrite && a2enmod headers
RUN a2ensite vh-local

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer