FROM php:8.2-cli

# Install system dependencies & PHP extensions
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev zip libpq-dev \
    && docker-php-ext-install zip pdo pdo_mysql pdo_pgsql pgsql

# Copy composer from official image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer install --no-dev --no-interaction --optimize-autoloader

# Create missing Laravel framework storage directories explicitly
RUN mkdir -p storage/framework/sessions \
    && mkdir -p storage/framework/views \
    && mkdir -p storage/framework/cache \
    && mkdir -p storage/logs \
    && chmod -R 777 storage bootstrap/cache

# Expose port and start Laravel's built-in server
EXPOSE 8000
CMD ["sh", "-c", "php artisan config:clear && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=$(printf '%d' ${PORT:-8000})"]
