# Start with an official PHP + Apache image
FROM php:8.2-apache

# Install needed PHP extensions
RUN docker-php-ext-install mysqli

# Download and extract WordPress
RUN apt-get update && apt-get install -y wget unzip \
    && wget https://wordpress.org/latest.zip \
    && unzip latest.zip -d /var/www/html/ \
    && rm latest.zip

# Copy your wp-config.php file (overwriting the default sample)
COPY wp-config.php /var/www/html/wordpress/wp-config.php

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html/wordpress

# Set the working directory
WORKDIR /var/www/html/wordpress

EXPOSE 80
CMD ["apache2-foreground"]
