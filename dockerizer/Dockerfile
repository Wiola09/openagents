FROM webdevops/php-nginx:8.3-alpine

COPY ./dockerizer/php.ini /opt/docker/etc/php/php.ini
COPY ./dockerizer/vhost.conf /opt/docker/etc/nginx/vhost.conf
COPY composer.json composer.lock /app/
WORKDIR /app
RUN composer install --no-interaction --no-scripts --no-suggest
COPY . /app
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache /app/storage/logs
RUN chmod -R 775 /app/storage /app/bootstrap/cache /app/storage/logs
