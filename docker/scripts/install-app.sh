#!/bin/bash

composer install --no-interaction --no-plugins --no-scripts --prefer-dist
chmod 777 -R /var/www/storage /var/www/bootstrap

php artisan migrate
php artisan db:seed

exec php-fpm
