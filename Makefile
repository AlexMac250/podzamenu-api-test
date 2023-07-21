.DEFAULT_GOAL := help

## Install in dev mode
install: env c-inst cache-clear

## Run composer install
c-inst:
	composer install

## Clear cache
cache-clear:
	$(CONSOLE) cache:clear

## Copy .env to .env.local if doesn't exists
env:
ifeq ("$(wildcard ./.env.local)", "")
	$(info .env.local files doesn't exist. Copying .env -> .env.local)
	cp -n .env .env.local

else
	$(info .env.local file already exists.)
endif
	$(info Configure the parameters in the .env.local file)

## Run php-cs-fixer
cs:
	vendor/bin/php-cs-fixer fix --verbose --config=.php-cs-fixer.php

## This help screen
help:
	@printf "Available targets:\n\n"
	@awk '/^[a-zA-Z\-_0-9%:\\]+/ { \
	  helpMessage = match(lastLine, /^## (.*)/); \
	  if (helpMessage) { \
		helpCommand = $$1; \
		helpMessage = substr(lastLine, RSTART + 3, RLENGTH); \
	gsub("\\\\", "", helpCommand); \
	gsub(":+$$", "", helpCommand); \
		printf "  \x1b[32;01m%-35s\x1b[0m %s\n", helpCommand, helpMessage; \
	  } \
	} \
	{ lastLine = $$0 }' $(MAKEFILE_LIST) | sort -u
	@printf "\n"
