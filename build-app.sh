#!/bin/bash
# Make sure this file has executable permissions, run `chmod +x build-app.sh`

# Exit the script if any command fails
set -e

composer install

# Build assets using NPM
npm install

npm run build

# Clear cache
php artisan optimize:clear
php artisan optimize

# Cache the various components of the Laravel application
php artisan config:cache
php artisan event:cache
php artisan route:cache
php artisan view:cache
php artisan migrate:fresh --force
php artisan db:seed
php artisan storage:link
