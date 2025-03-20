# Laravel-App APP

A demo application to illustrate how [Laravel JSON:API](https://laraveljsonapi.io/) works with [Laravel](https://laravel.com/) and [FIlamentPhp](https://filamentphp.com/docs).

## Requirements

-   docker
-   docker-compose
-   https://filamentphp.com/docs
-   https://laraveljsonapi.io/5.x/
-   https://laravel.com/

## How to run

```bash
# After cloning the project
cd ./setup-laravel-app

# Add the project to hosts file
sudo sh -c "echo '127.0.0.1 laravel-app.local' >> /etc/hosts"

# Install sail
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs

## Setup envs
cp .env.example .env
#Build containers
make setup

## Start all containers
make up

## Migrations and seed
make migrate
make seed

## 0r run migrations seed
make db_fresh

## Migrate db test
make db_fresh_test


## Stop all containers
make stop

# Run dev
make front-dev

```
## WEB

```bash
#Api
http://laravel-app.local:{PORT}/api/v1/documentation
```
<img width="800" alt="APi example documentation" src="./api_doc_example.png">

#

```bash
#Admin
http://laravel-app.local:{PORT}/admin/login

User: admin@app.com
Password: password

```
<img width="800" alt="APi example documentation" src="./admin_dashboard-example.png">

#

## Command install o artisan command make file

```bash

#Example install package
make sail command="composer require require api-platform/laravel"

#Example command artisan
make sail command="artisan tinker"

#run scout jobs
make sail command="artisan queue:work redis --queue=scout"

#generate key
make sail command="artisan artisan key:generate"

```

## Create sail alias

```bash
#create alias
alias sail="./vendor/bin/sail"
```

## Execute command example

```bash
# run command
sail artisan migrate:fresh

#install package
sail composer require api-platform/laravel

#generate token
sail artisan app:token-api-generator admin@app.com password

```

## Read the make file for more commands
