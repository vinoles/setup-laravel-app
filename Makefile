# Sail command
sail := "./vendor/bin/sail"

# Initial Config
setup: up install migrate seed front-install

# Build containers
up:
	$(sail) up -d

# Composer install
install:
	$(sail) composer install

# Run tests
test:
	$(sail) artisan test

# Clear cache
cache:
	$(sail) artisan cache:clear && $(sail) artisan config:clear && $(sail) artisan route:clear

# Run filtered test
test_filter:
	$(sail) artisan test --filter $(file)

# Stop containers
stop:
	$(sail) down

# Run migrations
migrate:
	$(sail) artisan migrate

# Run migrations and seed
seed:
	$(sail) artisan db:seed

# Refresh database and migrations
db_fresh:
	$(sail) artisan migrate:fresh --seed --force

# Refresh test database and migrations
db_fresh_test:
	$(sail) artisan migrate:fresh --force --database=mysql_test

# Rollback migrations
rollback:
	$(sail) artisan migrate:rollback

# Tinker
tinker:
	$(sail) artisan tinker

# Generate application key
key:
	$(sail) artisan key:generate

# Publish language files
lang:
	$(sail) artisan lang:publish

# Front-end install
front-install:
	$(sail) bun install
	$(sail) bun run build

# Front-end development
front-dev:
	$(sail) composer run dev

# Front-end build
front-build:
	$(sail) bun run build

# Shell access
shell:
	$(sail) shell

# Package discovery
pdiscover:
	$(sail) artisan package:discover

# Sail command
sail:
	$(sail) $(command)
