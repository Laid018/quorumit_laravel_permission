FROM php:8.1-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

#Installing node 16.x
RUN curl -sL https://deb.nodesource.com/setup_16.x| bash -
# RUN apt-get install -y nodejs npm
RUN apt-get update && apt-get install -y nodejs npm


EXPOSE 8000
CMD php artisan serve --host=0.0.0.0 --port=8000
