FROM php:8.2-cli

# Install system dependencies & PHP extensions
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev zip libpq-dev \
    && docker-php-ext-install zip pdo pdo_mysql pdo_pgsql pgsql

# Copy composer from official image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer install

# Expose port and start Laravel's built-in server
EXPOSE 10000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]