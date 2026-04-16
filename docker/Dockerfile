# ── Stage 1: Build Tailwind CSS ───────────────────────────────────────────────
FROM node:20-alpine AS css-builder

WORKDIR /build

COPY package*.json tailwind.config.js ./
COPY resources/ resources/
COPY templates/ templates/
COPY public/    public/

RUN npm ci && npm run build

# ── Stage 2: Composer dependencies ────────────────────────────────────────────
FROM composer:2 AS composer-builder

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# ── Stage 3: PHP-FPM runtime ──────────────────────────────────────────────────
FROM php:8.2-fpm-alpine AS phpfpm

# Install PDO SQLite
RUN apk add --no-cache sqlite-libs sqlite-dev \
    && docker-php-ext-install pdo pdo_sqlite opcache

# Opcache
RUN { \
    echo 'opcache.enable=1'; \
    echo 'opcache.revalidate_freq=0'; \
    echo 'opcache.validate_timestamps=1'; \
    echo 'opcache.max_accelerated_files=10000'; \
    echo 'opcache.memory_consumption=128'; \
    echo 'opcache.interned_strings_buffer=16'; \
    echo 'opcache.fast_shutdown=1'; \
} > /usr/local/etc/php/conf.d/opcache.ini

# PHP runtime settings
RUN { \
    echo 'upload_max_filesize=16M'; \
    echo 'post_max_size=16M'; \
    echo 'max_execution_time=30'; \
    echo 'session.cookie_httponly=1'; \
    echo 'session.cookie_samesite=Lax'; \
} > /usr/local/etc/php/conf.d/custom.ini

# Ensure storage dir exists and www-data can write to it
RUN mkdir -p /var/www/html/storage \
    && chown -R www-data:www-data /var/www/html/storage

# Copy application code into image (production — no bind mount)
COPY --chown=www-data:www-data . /var/www/html/

# Overwrite with compiled CSS from builder stage
COPY --from=css-builder /build/public/assets/css/tailwind.css /var/www/html/public/assets/css/tailwind.css

# Copy vendor from composer builder
COPY --from=composer-builder /app/vendor /var/www/html/vendor

# Storage must be writable
RUN chown -R www-data:www-data /var/www/html/storage

WORKDIR /var/www/html

# ── Stage 4: Nginx with baked-in config + static assets ───────────────────────
FROM nginx:alpine AS nginx

# Bake in nginx config — no bind mount needed
COPY docker/nginx.conf /etc/nginx/conf.d/default.conf

# Copy only the public directory (static assets: CSS, JS, SVGs, images)
COPY --from=css-builder /build/public /var/www/html/public

# Copy brand SVGs (source of truth is assets/brand/)
COPY assets/brand/ /var/www/html/public/assets/brand/
