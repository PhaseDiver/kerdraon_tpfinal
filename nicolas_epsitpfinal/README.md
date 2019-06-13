# Symfony Pokemon TP FINAL#
 -------------

Prérequs et Installations des dependances

composer require symfony/maker-bundle
composer require -dev doctrine/doctrine-fixtures-bundle
composer require admin 

 
Commandes utiles:



#creation d'entité
php bin/console make:entity

#creation base et migration
php bin/console doctrine:database:create
php bin/console make:migration 
php bin/console doctrine:migration:migrates
#diagnostic de la configuration des routes
php bin/console debug:router:



TP Final EPSI B2
