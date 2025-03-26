#!/bin/bash

set -eux

bin/console doctrine:database:drop --if-exists --force
rm migrations/*.php || true
bin/console doctrine:database:create
bin/console doctrine:cache:clear-metadata
bin/console doctrine:migrations:diff
bin/console doctrine:migrations:migrate --no-interaction
echo "yes" | bin/console doctrine:fixtures:load
bin/console cache:clear

