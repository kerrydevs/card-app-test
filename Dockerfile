# Use the official PHP 8.2 FPM image as the base
FROM php:8.2-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer (optional, but recommended for PHP projects)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy application code (assuming you have a Laravel app)
COPY . .

# Install application dependencies (if using Composer)
RUN composer install

# Expose port 9000 (default for PHP-FPM)
EXPOSE 9000

# Command to run PHP-FPM
CMD ["php-fpm"]
