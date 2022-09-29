up:
	docker compose up -d
build:
	docker compose build
laravel-install:
	docker compose exec backend composer create-project --prefer-dist laravel/laravel .
create-project:
	mkdir -p src/backend
	@make build
	@make up
	@make laravel-install
	docker compose exec backend php artisan key:generate
	docker compose exec backend php artisan storage:link
	docker compose exec backend chmod -R 777 storage bootstrap/cache
	@make fresh
install-recommend-packages:
	docker compose exec backend composer require doctrine/dbal
	docker compose exec backend composer require --dev ucan-lab/laravel-dacapo
	docker compose exec backend composer require --dev barryvdh/laravel-ide-helper
	docker compose exec backend composer require --dev beyondcode/laravel-dump-server
	docker compose exec backend composer require --dev barryvdh/laravel-debugbar
	docker compose exec backend composer require --dev roave/security-advisories:dev-master
	docker compose exec backend php artisan vendor:publish --provider="BeyondCode\DumpServer\DumpServerServiceProvider"
	docker compose exec backend php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider"
init:
	docker compose up -d --build
	docker compose exec backend composer install
	docker compose exec backend cp .env.example .env
	docker compose exec backend php artisan key:generate
	docker compose exec backend php artisan storage:link
	docker compose exec backend chmod -R 777 storage bootstrap/cache
	@make fresh
remake:
	@make destroy
	@make init
stop:
	docker compose stop
down:
	docker compose down --remove-orphans
down-v:
	docker compose down --remove-orphans --volumes
restart:
	@make down
	@make up
destroy:
	docker compose down --rmi all --volumes --remove-orphans
ps:
	docker compose ps
logs:
	docker compose logs
logs-watch:
	docker compose logs --follow
log-nginx:
	docker compose logs nginx
log-nginx-watch:
	docker compose logs --follow nginx
log-backend:
	docker compose logs backend
log-backend-watch:
	docker compose logs --follow backend
log-db:
	docker compose logs db
log-db-watch:
	docker compose logs --follow db
nginx:
	docker compose exec nginx bash
backend:
	docker compose exec backend bash
frontend:
	docker compose exec frontend bash
migrate:
	docker compose exec backend php artisan migrate
fresh:
	docker compose exec backend php artisan migrate:fresh --seed
seed:
	docker compose exec backend php artisan db:seed
dacapo:
	docker compose exec backend php artisan dacapo
rollback-test:
	docker compose exec backend php artisan migrate:fresh
	docker compose exec backend php artisan migrate:refresh
tinker:
	docker compose exec backend php artisan tinker
test:
	docker compose exec backend php artisan test
optimize:
	docker compose exec backend php artisan optimize
optimize-clear:
	docker compose exec backend php artisan optimize:clear
cache:
	docker compose exec backend composer dump-autoload -o
	@make optimize
	docker compose exec backend php artisan event:cache
	docker compose exec backend php artisan view:cache
cache-clear:
	docker compose exec backend composer clear-cache
	@make optimize-clear
	docker compose exec backend php artisan event:clear
db:
	docker compose exec db bash
sql:
	docker compose exec db bash -c 'mysql -u $$MYSQL_USER -p$$MYSQL_PASSWORD $$MYSQL_DATABASE'
redis:
	docker compose exec redis redis-cli
ide-helper:
	docker compose exec backend php artisan clear-compiled
	docker compose exec backend php artisan ide-helper:generate
	docker compose exec backend php artisan ide-helper:meta
	docker compose exec backend php artisan ide-helper:models --nowrite
stan:
	./vendor/bin/phpstan analyse --memory-limit=3G
