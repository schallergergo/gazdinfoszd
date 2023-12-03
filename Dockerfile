# Use an official PHP image as a base image
FROM php:7.4-fpm

# Set the working directory in the container
WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libpq-dev \
    && docker-php-ext-install pdo_mysql pdo_pgsql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the Laravel application files to the container
COPY . .

# Install Laravel dependencies
RUN composer install

# Generate the application key
RUN php artisan key:generate

# Expose port 80 (adjust if your Laravel app uses a different port)
EXPOSE 80

# Start PHP-FPM
CMD ["php-fpm"]
