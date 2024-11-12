build:
	docker-compose build

run:
	docker-compose up -d

composer:
	docker-compose exec app bash -c "cd /var/www/html && composer install"

migrate:
	docker-compose exec app bash -c "cd /var/www/html && php artisan migrate"

seed:
	docker-compose exec app bash -c "cd /var/www/html && php artisan db:seed"

env:
	docker-compose exec app bash -c "cd /var/www/html && cp .env.dev .env"

generate-key:
	docker-compose exec app bash -c "cd /var/www/html && php artisan key:generate"

jwt-secret:
	docker-compose exec app bash -c "cd /var/www/html && php artisan jwt:secret"

start: build run

stop:
	docker-compose down

logs:
	docker-compose logs -f app

deploy: start composer env migrate generate-key jwt-secret seed

info-logs:
	docker compose exec app bash -c "tail -1000 ./storage/logs/laravel.log | grep INFO"

run-tests:
	docker compose exec app bash -c "php vendor/bin/phpunit"