#!/bin/sh
cd /var/www/html

php artisan migrate:fresh
php artisan cache:table
php artisan session:table
php artisan migrate
php artisan cache:clear
php artisan route:cache

php-fpm &
