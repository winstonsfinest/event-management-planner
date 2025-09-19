FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=www-data:www-data . /var/www

# Create .env file if it doesn't exist
RUN if [ ! -f .env ]; then cp .env.example .env 2>/dev/null || echo "APP_NAME=Laravel" > .env; fi

# Force PostgreSQL configuration
RUN echo "DB_CONNECTION=pgsql" >> .env
RUN echo "DB_HOST=dpg-d36pkd3uibrs73aihe5g-a.oregon-postgres.render.com" >> .env
RUN echo "DB_PORT=5432" >> .env
RUN echo "DB_DATABASE=event_management_2xw5" >> .env
RUN echo "DB_USERNAME=event_user" >> .env
RUN echo "DB_PASSWORD=ThxhBQaeDfhCRybZAHn1vauvuRccvIUo" >> .env

# Force session configuration
RUN echo "SESSION_DRIVER=database" >> .env
RUN echo "SESSION_LIFETIME=120" >> .env
RUN echo "SESSION_ENCRYPT=false" >> .env
RUN echo "CACHE_DRIVER=database" >> .env

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Generate application key
RUN php artisan key:generate

# Run migrations first to create database tables
RUN php artisan migrate --force

# Seed the database with admin user and sample data
RUN php artisan db:seed --force

# Clear all caches first, then cache configuration
RUN php artisan config:clear
RUN php artisan route:clear
RUN php artisan view:clear
RUN php artisan cache:clear
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Change current user to www
USER www-data

# Expose port 10000 (Render's default port)
EXPOSE 10000
CMD php artisan serve --host=0.0.0.0 --port=$PORT
