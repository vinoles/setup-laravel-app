# Weetals

Weetals APP

A quick-start project to set up a Laravel application using Laravel JSON:API, Laravel, and Filament PHP.
## Requirements

- Docker
- Docker Compose
- [Filament PHP](https://filamentphp.com/docs)
- [Laravel JSON:API](https://laraveljsonapi.io/5.x/)
- [Laravel](https://laravel.com/)
- [Demo api](https://setup-weetals-production.up.railway.app/api/v1/documentation)
- [Demo admin panel](https://setup-weetals-production.up.railway.app/admin)

## How to Run

```bash
# After cloning the project
cd ./setup-weetals

# Add the project to the hosts file
sudo sh -c "echo '127.0.0.1 weetals.local' >> /etc/hosts"

# Install Sail
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs

# Setup environment variables
cp .env.example .env

# Build containers
make setup

# Start all containers
make up

# Run migrations and seed database
make migrate
make seed

# Alternatively, run migrations and seed in one command
make db_fresh

# Migrate test database
make db_fresh_test

# Stop all containers
make stop

# Run frontend in development mode
make front-dev
```

## Web Access

### API
```bash
http://weetals.local:8080/api/v1/documentation
```
<img width="800" alt="API example documentation" src="./api_doc_example.png">

### Admin Panel
```bash
http://weetals.local:8080/admin/login

User: admin@app.com
Password: password
```
<img width="800" alt="Admin dashboard example" src="./admin_dashboard-example.png">

## Command Installation & Artisan Commands

```bash
# Example: Install a package
make sail command="composer require api-platform/laravel"

# Example: Run an Artisan command
make sail command="artisan tinker"

# Run Scout jobs
make sail command="artisan queue:work redis --queue=scout"

# Generate application key
make sail command="artisan key:generate"
```

## Create Sail Alias

```bash
#create alias
alias sail="./vendor/bin/sail"
```

## Execute Commands with Sail

```bash
# Run database migrations
sail artisan migrate:fresh

# Install a package
sail composer require api-platform/laravel

# Generate an API token
sail artisan app:token-api-generator admin@app.com password
```

## Additional Commands
Refer to the `Makefile` for more available commands.
