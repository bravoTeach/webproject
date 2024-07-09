# Use the official PHP image as a base
FROM php:7.4-apache

# Copy PHP source files to the Apache root directory
COPY . /var/www/html/

# Install required PHP extensions
RUN docker-php-ext-install mysqli

# Expose port 80
EXPOSE 80
