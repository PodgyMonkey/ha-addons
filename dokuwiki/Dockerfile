ARG BUILD_FROM
FROM ${BUILD_FROM}

# Install nginx, PHP 8.3 and required extensions
RUN apk add --no-cache \
    nginx \
    curl \
    jq \
    php83 \
    php83-fpm \
    php83-gd \
    php83-xml \
    php83-dom \
    php83-curl \
    php83-mbstring \
    php83-zip \
    php83-intl \
    php83-openssl \
    php83-session \
    php83-json \
    php83-ctype \
    php83-fileinfo \
    php83-iconv \
    php83-pdo \
    php83-pdo_sqlite

# Download and extract DokuWiki stable
ARG DOKUWIKI_VERSION=stable
RUN curl -fsSL "https://download.dokuwiki.org/src/dokuwiki/dokuwiki-${DOKUWIKI_VERSION}.tgz" \
    | tar -xz -C /tmp \
    && mv /tmp/dokuwiki* /var/www/dokuwiki \
    && cp -a /var/www/dokuwiki /var/www/dokuwiki.dist \
    && chown -R nobody:nobody /var/www/dokuwiki

# Copy rootfs
COPY rootfs /

# Make scripts executable
RUN chmod a+x \
    /etc/s6-overlay/scripts/init-dokuwiki \
    /etc/s6-overlay/s6-rc.d/php-fpm/run \
    /etc/s6-overlay/s6-rc.d/php-fpm/finish \
    /etc/s6-overlay/s6-rc.d/nginx/run \
    /etc/s6-overlay/s6-rc.d/nginx/finish
