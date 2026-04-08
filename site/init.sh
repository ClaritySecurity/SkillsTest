#!/bin/sh
cd /var/www/html

touch database/database.sqlite

php artisan migrate:fresh
php artisan cache:clear
php artisan route:cache

npm run dev &

php-fpm &
