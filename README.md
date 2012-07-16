ACSEO PHPUnit Showcase
========================

Ce projet montre par l'exemple l'utilisation de tests unitaires et de tests fonctionnels avec
PHPUnit et le Framework Symfony2

1) Projet
========================


Le projet repose sur Symfony2 et utilise [Composer][1].
Il inclue entre autre [FOSUserBundle][2] pour la gestion de la sécurité.

1.1) Pour installer le projet, il suffit de taper la commande suivante :
----------------------------------

    php composer.phar install

1.2) Vous devez ensuite éditer le fichier app/config/parameters.yml
----------------------------------
1.3) Vous pouvez créer la base de données:
----------------------------------
    php app/console doctrine:database:create
    php app/console doctrine:schema:create --force

1.4) Il faudra également créer un utilisateur :
----------------------------------

    php app/console fos:user:create
    Please choose an username : npotier
    Please choose an email : sf2PHPUnitshowcase@acseo-conseil.fr
    Please choose an password : c1secret

    php app/console fos:user:promote
    Please choose an username : npotier
    Please choose a role : ROLE_ADMIN

Le projet est configuré !

2) Lancement des tests : 
========================
Les tests unitaires et fonctionnels se situent dans src/ACSEO/Bundle/sf2PHPUnitShowcase/Tests.
Pour les lancer, taper la commande suivante : 

    phpunit -c app


[1]:  http://getcomposer.org/
[2]:  http://packagist.org/packages/friendsofsymfony/user-bundle