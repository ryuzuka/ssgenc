#!/bin/bash

echo "This a bash script to run composer clear the caches"
echo "--------------"
php -v
echo "--------------"

cd /var/www/ssgenc

php artisan down

composer dump-autoload -o

php artisan view:clear
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan clear-compiled
php artisan config:cache
php artisan optimize

#db refresh migration
#php artisan db:seed

chown -R nginx:nginx /var/www/ssgenc/public
chown -R nginx:nginx /var/www/ssgenc/storage

chmod -R 777 /var/www/ssgenc/public
chmod -R 777 /var/www/ssgenc/storage

php artisan up