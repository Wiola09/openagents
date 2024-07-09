FROM webdevops/php-nginx:8.3-alpine

COPY ./dockerizer/php.ini /opt/docker/etc/php/php.ini
COPY ./dockerizer/vhost.conf /opt/docker/etc/nginx/vhost.conf
COPY composer.json composer.lock /
COPY composer.json composer.lock /app/
COPY composer.json composer.lock /app/app/
RUN composer install --no-interaction --no-scripts --no-suggest
COPY . /app
