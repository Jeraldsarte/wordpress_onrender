# Use the official WordPress image
FROM wordpress:php8.2-apache

# Set working directory
WORKDIR /var/www/html

# Copy your wp-config.php into the container
COPY wp-config.php /var/www/html/wp-config.php

# Set correct permissions for WordPress
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
