# Use official PHP-Apache image
FROM php:8.2-apache

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html/

# Copy the contents of the ecommerce folder into Apache's web root
COPY ./Ecommerce-main/ecommerce/ /var/www/html/

# Set proper permissions (optional but helpful)
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Optional: suppress Apache ServerName warning
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Expose port 80
EXPOSE 80
