#!/bin/bash

set -e

echo "Running entrypoint scripts....."
echo "Setting permissions....."

chown -R www-data:www-data storage bootstrap/cache || true
chmod -R 775 storage bootstrap/cache || true
chmod 1777 /tmp || true

echo "Running migrations"
php artisan migrate --force

echo "Running PHP FPM....."
exec "$@"
