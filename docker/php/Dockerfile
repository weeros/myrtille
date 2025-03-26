FROM php:8.3-apache

COPY docker/services/php/ /usr/local/etc/php/
COPY docker/services/apache2/ /etc/apache2/sites-available/

RUN mkdir -p /var/www/html/var/cache /var/www/html/var/uploads /var/www/html/var/log /var/www/html/public/ \
 && apt-get update \
 && apt-get install -y \
    wget \
    curl \
    git \
    g++ make autoconf \
    libmcrypt-dev \
    libzip-dev \
    coreutils \
    libpng-dev \
    libjpeg-dev \
    libwebp-dev \
    libfreetype6-dev \
    libicu-dev \
    net-tools \
    supervisor \
    cron \
 && docker-php-ext-configure zip \
 && docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg --with-webp \
 && docker-php-ext-install -j$(nproc) gd intl pdo_mysql mysqli zip opcache \
 && docker-php-ext-enable opcache gd \
 && docker-php-source delete \
 && rm -rf /var/cache/apt/archives \
 && a2dissite 000-default \
 && a2ensite default-vhost \
 && a2enmod rewrite env headers alias

COPY docker/php/add-local-certificat.sh /usr/local/bin/add-local-certificat
RUN chmod +x /usr/local/bin/add-local-certificat
RUN add-local-certificat data.jsdelivr.com 443

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY docker/php/program-apache.conf  /etc/supervisor/conf.d/program-apache.conf
COPY docker/php/program-queue.conf /etc/supervisor/conf.d/program-queue.conf
COPY docker/php/program-cron.conf    /etc/supervisor/conf.d/program-cron.conf

COPY docker/php/program-batch.conf /etc/supervisor/conf.d/program-batch.conf
COPY docker/php/batch.sh /opt/batch.sh
RUN chmod +x /opt/batch.sh

COPY docker/php/crontab /etc/cron.d/symfony
RUN chmod 755 /etc/cron.d/symfony


ENTRYPOINT ["/usr/bin/supervisord", "--nodaemon"]
