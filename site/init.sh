#!/bin/sh
cd /var/www/html

composer install
npm install
php artisan key:generate --force
touch database/database.sqlite

php artisan migrate:fresh
php artisan cache:clear
php artisan route:cache

npm run dev -- --host &

php-fpm &
