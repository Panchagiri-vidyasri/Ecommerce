# Use official PHP 8.2 with Apache
FROM php:8.2-apache

# Install required PHP extensions and system packages
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    default-mysql-client \
    && docker-php-ext-install pdo pdo_mysql mysqli

# Enable Apache modules
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html/

# Copy the application source code into the container
COPY ./ecommerce/ /var/www/html/

# Set appropriate ownership and permissions
RUN chown -R www-data:www-data /var/www/html/ \
    && chmod -R 755 /var/www/html/

# Optional: Expose port (already default 80 for Apache)
EXPOSE 80
