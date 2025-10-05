# Use official WordPress image
FROM wordpress:latest

# Copy any custom config if needed
COPY ./wp-config.php /var/www/html/wp-config.php
