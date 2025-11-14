FROM php:8-fpm AS composer

# install composer deps
RUN <<EOF
apt-get update
apt-get install -y --no-install-recommends unzip
rm -rf /var/cache/apt/archives /var/lib/apt/lists/*
EOF

# Install composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

FROM composer AS php

RUN <<EOF
apt-get update
apt-get install -y --no-install-recommends libsqlite3-0 libavif-dev libpng-dev zlib1g-dev
rm -rf /var/cache/apt/archives /var/lib/apt/lists/*
EOF

# Install extensions
RUN <<EOF
docker-php-ext-configure gd --with-avif
docker-php-ext-install -j"$(nproc)" opcache gd
pecl install apcu && pecl clear-cache && docker-php-ext-enable apcu
EOF

# Patch default config
RUN <<EOF
mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
sed -i 's/\(pm\.max_children = \).*/\148/' /usr/local/etc/php-fpm.d/www.conf
sed -i 's/\(pm = \).*/\1ondemand/' /usr/local/etc/php-fpm.d/www.conf
sed -i 's/\(memory_limit = \).*/\1512M/' /usr/local/etc/php/php.ini
EOF

# Enable opcache
COPY opcache.ini /usr/local/etc/php/conf.d/
# Increase file limits
COPY limits.conf /etc/security/limits.conf
# Use socket for fpm
COPY zz-docker.conf /usr/local/etc/php-fpm.d/zz-docker.conf
