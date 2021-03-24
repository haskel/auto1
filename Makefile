PHP_SERVICE := php

build:
	@docker-compose build

up:
	@docker-compose up -d

composer:
	@docker-compose exec -T $(PHP_SERVICE) composer install

down:
	@docker-compose down

clean:
	@docker-compose down
	@docker system prune --volumes --force

config:
	@docker-compose config

init:
	@make build
	@make up
	@make composer

php-console-zsh:
	@docker-compose exec $(PHP_SERVICE) zsh

php-console-bash:
	@docker-compose exec $(PHP_SERVICE) bash

test:
	@docker-compose exec $(PHP_SERVICE) php /var/www/app/bin/phpunit /var/www/app/tests

psalm:
	@docker-compose exec $(PHP_SERVICE) php /var/www/app/vendor/bin/psalm