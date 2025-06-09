# Use official PHP image with Apache
FROM php:8.2-apache

# Enable Apache rewrite module
RUN a2enmod rewrite

# Set working directory inside container
WORKDIR /var/www/html/

# Copy your ecommerce application files into Apache web root
COPY ./ecommerce/ /var/www/html/

# (Optional) Set permissions for Apache user (www-data)
RUN chown -R www-data:www-data /var/www/html/

# Expose port 80 for the web server
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
