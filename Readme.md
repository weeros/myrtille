# Project Myrtille

Le but du projet est d'explorer supervisor à travers un projet Symfony, et en profiter pour étudier l'utilisation de Messenger Bus et Mercure.

## Technologies:

* PHP 8.3
* Symfony 7.2
* Mariadb 11.3
* Supervisor
* Mercure
* Mailpit


## Initialisation 

Création des tables
```shell
bin/console doctrine:cache:clear-metadata
bin/console doctrine:migrations:diff
bin/console doctrine:migrations:migrate --no-interaction
```

Chargement des fixtures
```shell
php bin/console doctrine:fixtures:load
```

Commandes d'import des données
```shell
php bin/console import:station
php bin/console import:parking
php bin/console import:trafic
```

Commandes Supervisor
```shell
supervisorctl start cron
supervisorctl start queue
supervisorctl start apache
supervisorctl start batch
supervisorctl start batch1
supervisorctl start batch2
supervisorctl start batch3
```

```shell
supervisorctl stop cron
supervisorctl stop queue
supervisorctl stop apache
supervisorctl stop batch
supervisorctl stop batch1
supervisorctl stop batch2
supervisorctl stop batch3
```


# Annexes
| Tables                | Liens                                                                         | 
|-----------------------|-------------------------------------------------------------------------------|
| OpenData Station Vcub | https://opendata.bordeaux-metropole.fr/explore/dataset/ci_vcub_p/information/ |
| Supervisor            | http://supervisord.org/configuration.html |
| Mercure               | https://opendata.bordeaux-metropole.fr/explore/dataset/ci_vcub_p/information/ |
| Messenger             | https://opendata.bordeaux-metropole.fr/explore/dataset/ci_vcub_p/information/ |


