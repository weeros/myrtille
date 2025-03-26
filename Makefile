.DEFAULT_GOAL := help

PERL=/usr/bin/perl

PHPUNIT_EXEC ?= ./vendor/bin/phpunit

HELP_FUN = \
	%help; while(<>){push@{$$help{$$2//'options'}},[$$1,$$3] \
	if/^([\w\-]+)\s*:.*\#\#(?:@([^@]*)@)?\s(.*)$$/}; \
	print"$$_:\n", map"  $$_->[0]".(" "x(32-length($$_->[0])))."$$_->[1]\n",\
	@{$$help{$$_}},"\n" for sort keys %help

DOCKER_COMPOSE=docker compose
DOCKER_USERNAME=root

help: ##@Miscellaneous@ Show this help
	@echo "Usage: make [target] ...\n"
	@$(PERL) -e '$(HELP_FUN)' $(MAKEFILE_LIST)

.PHONY: docker-build
docker-build: ##@Docker@ Builds current project image.
	@echo "Build Docker image."
	HTTP_PROXY=$(HTTP_PROXY) HTTPS_PROXY=$(HTTPS_PROXY) ${DOCKER_COMPOSE}  build --no-cache

.PHONY: docker-up
docker-up: ##@Docker@ Start up containers.
	@echo "Starting up containers."
	${DOCKER_COMPOSE}  up -d --remove-orphans

.PHONY: docker-down
docker-down: ##@Docker@ Stop containers.
	@echo "Stop containers and remove containers, networks, volumes, and images created."
	${DOCKER_COMPOSE}  down

.PHONY: docker-restart
docker-restart: ##@Docker@ Restart containers.
	make docker-down
	make docker-up

.PHONY: docker-install
docker-install: docker-build docker-up install yarn

.PHONY: docker-status
docker-status: ##@Docker@ Print docker logs and container status.
	@echo "Container logs for $(PROJECT_NAME) ---------------------------------------------------------"
	${DOCKER_COMPOSE}  logs
	@echo "Container status for $(PROJECT_NAME) -------------------------------------------------------"
	${DOCKER_COMPOSE}  ps

.PHONY: bash
bash: ##@Docker@ Get interactive prompt into web container.
	${DOCKER_COMPOSE} exec web bash

.PHONY: database
database:
	${DOCKER_COMPOSE} exec web php bin/console doctrine:database:create --if-not-exists

.PHONY: schema
schema: ##@Composer@ Executes composer command with arguments.
	${DOCKER_COMPOSE} exec web php bin/console doctrine:schema:update --force

.PHONY: composer
composer: ##@Composer@ Executes composer command with arguments.
	${DOCKER_COMPOSE} exec web composer $(filter-out $@,$(MAKECMDGOALS))

require: composer ##@Composer@ Executes composer require command with arguments.

.PHONY: require-dev
require-dev: ##@Composer@ Executes composer require command to require-dev.
	make require " --dev" $(filter-out $@,$(MAKECMDGOALS))

.PHONY: install
install: composer ##@Composer@ Executes composer install command.

.PHONY: clear
 clear: ##@Composer@ Executes composer command with arguments.
	${DOCKER_COMPOSE} exec web php bin/console cache:clear

.PHONY: install-no-dev
install-no-dev: ##@Composer@ Composer install - Skip installing packages listed in require-dev
	make install " --no-dev"

.PHONY: update
update: composer ##@Composer@ Executes composer update command.

.PHONY: update-no-dev
update-no-dev: ##@Composer@ Composer update - Skip installing packages listed in require-dev
	make update " --no-dev"

.PHONY: update-dry
update-dry: ##@Composer@ Composer update - Simulate the update and show you what would happen
	make update " --dry-run"

.PHONY: phpcs
phpcs: ##@Tests@ Run code sniffer on specified path
	${DOCKER_COMPOSE} exec web phpcs --config-set default_standard Drupal,DrupalPractice
	${DOCKER_COMPOSE} exec web phpcs $(CUSTOM_MODULES_PATH)

.PHONY: phpcbf
phpcbf: ##@Tests@ Run Code Beautifier and Fixer on specified path
	${DOCKER_COMPOSE} exec web phpcs --config-set default_standard Drupal,DrupalPractice
	${DOCKER_COMPOSE} exec web phpcbf $(CUSTOM_MODULES_PATH)

.PHONY: phpunit
phpunit: ##@Tests@ Check if phpunit is installed
	${DOCKER_COMPOSE} exec web $(PHPUNIT_EXEC) --version

.PHONY: run-tests
run-tests: ##@Tests@ Run phpunit tests for custom modules
	${DOCKER_COMPOSE} exec web $(PHPUNIT_EXEC) -c $(PHPUNIT_CONF) $(CUSTOM_MODULES_PATH)

%:
	@:
