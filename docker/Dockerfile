# ── Stage 1: Build Tailwind CSS ───────────────────────────────────────────────
FROM node:20-alpine AS css-builder

WORKDIR /build

COPY package*.json tailwind.config.js ./
COPY resources/ resources/
COPY templates/ templates/
COPY public/    public/

RUN npm ci && npm run build

# ── Stage 2: PHP-FPM runtime ──────────────────────────────────────────────────
FROM php:8.2-fpm-alpine

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

# Copy compiled CSS from builder stage
COPY --from=css-builder /build/public/assets/css/tailwind.css /var/www/html/public/assets/css/tailwind.css

WORKDIR /var/www/html

