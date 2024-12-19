SERVICE_NAME=app
DC=$(if $(shell docker-compose --version 2>/dev/null),docker-compose,docker compose) -f docker-compose.yml
DCE=${DC} exec ${SERVICE_NAME}
PHP=${DCE} php
COMPOSER=${DCE} composer
CONSOLE=${PHP} artisan

.DEFAULT_GOAL := up

in:
	${DC} exec ${SERVICE_NAME} sh

###> DB
db:
	${DC} exec pgsql psql -U postgres -d manga-reader
fresh:
	${CONSOLE} migrate:fresh
refresh:
	${CONSOLE} migrate:refresh
###< DB

###> DOCKER COMPOSE
start:
	${DC} start
stop:
	${DC} stop
up:
	${DC} up -d
build:
	${DC} build
down:
	${DC} down
###< DOCKER COMPOSE
