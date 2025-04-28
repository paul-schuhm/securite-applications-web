# Démo (live) Validation, escape, sanitize

- [Démo (live) Validation, escape, sanitize](#démo-live-validation-escape-sanitize)
  - [Contexte](#contexte)
  - [Dictionnaire des données et contraintes métiers](#dictionnaire-des-données-et-contraintes-métiers)
  - [Prérequis](#prérequis)
  - [Lancer le projet](#lancer-le-projet)


## Contexte

Développer un formulaire de prise de rendez-vo>us pour un cabinet médical

## Dictionnaire des données et contraintes métiers

| Label  | Code  | Type  | Requis  | Contraintes métier / Commentaires  |
|---|---|---|---|---|
| Prénom  | firstname  | A  | Oui  | < 256 char  |
| Nom  | lastname  | A  | Oui  | < 256 char  |
| Date  | date  | D  | Oui  | Du lundi au vendredi, pas dans le passé. Format dd-mm-YYYY  |
| Créneau horaire  | time  | D  | Oui  | De 09:30 à 17h30, toutes les 1/2h   |
| Motif  | object  | A  | Oui  | Parmi les valeurs proposées (suivi, urgence, controle, autre, consultation)   |
| Nombre d'accompagnants  | nb_acc  | N  | Oui  | 0, 1 ou 2  |
| Rappel par SMS  | sms_notification  | B  | Oui  | 'yes' si oui, non sinon  |

## Prérequis

Installer PHP8+

## Lancer le projet

À la racine du projet :

~~~bash
php -S localhost:8990
~~~

Se rendre à l'URL `http://localhost:8990`


