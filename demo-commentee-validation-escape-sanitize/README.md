# Démo (live) Validation, escape, sanitize

Une démonstration des trois techniques fondamentales de gestion des données entrantes dans une application web :

- La validation (validate);
- L'échappement (escape);
- La sanitization (sanitize)

## Prérequis

- [Installer PHP8+](https://www.php.net/downloads.php)

## Lancer le projet

À la racine du projet :

~~~bash
php -S localhost:8990
~~~

> Remarque : On utilise [le serveur web interne de PHP](https://www.php.net/manual/fr/features.commandline.webserver.php), très utile pour le développement et de petits tests. Par défaut, PHP va servir tout le contenu du dossier courant et recherche un fichier `index.php` pour l'associer à l'URL racine `/`. Pour plus d'options, consulter le manuel de PHP (`man php` sur Unix)

Se rendre à l'URL `http://localhost:8990`


