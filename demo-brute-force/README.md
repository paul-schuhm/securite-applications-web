# Faille de sécurité : Brute force sur un système d'authentification

- [Faille de sécurité : Brute force sur un système d'authentification](#faille-de-sécurité--brute-force-sur-un-système-dauthentification)
  - [Qu'est ce qu'une attaque brute force ?](#quest-ce-quune-attaque-brute-force-)
  - [Quels sont les risques pour le système et ses utilisateur·ices ?](#quels-sont-les-risques-pour-le-système-et-ses-utilisateurices-)
  - [Lancer la démo](#lancer-la-démo)
  - [Cas nominal (attitude normal)](#cas-nominal-attitude-normal)
  - [Attaque](#attaque)
  - [Comment se prémunir ?](#comment-se-prémunir-)
    - [Bloquer temporairement un compte](#bloquer-temporairement-un-compte)
      - [Avantages](#avantages)
      - [Inconvénients](#inconvénients)
  - [Implémentation d'une solution](#implémentation-dune-solution)
  - [Références](#références)


## Qu'est ce qu'une attaque brute force ?

> Quel est le principe de cette attaque

## Quels sont les risques pour le système et ses utilisateur·ices ?

> Quels dommages, etc.

## Lancer la démo

> Comment lancer votre démo minimale de l'attaque

~~~bash
php -S localhost:8990 -t src
~~~

> Remarque : l'option `-t` permet de servir le contenu du dossier `src`

## Cas nominal (attitude normal)

> Scénario/Fonctionnement attendu (comportement normal)

Soumettre le formulaire avec les credentials de notre user :

- login : `jdoe`
- password : `password`

Ou avec cURL (sans utiliser le formulaire) :

~~~bash
curl -X POST -d "login=jdoe&password=password" localhost:8990/login.php
~~~

## Attaque

> Scénario/Fonctionnement d'attaque (comportement d'attaque). Exploitation de la faille

~~~bash
./attack.sh
~~~

> Décrire les dommages causés dans cette expérience minimale

Inspecter le fichier de log (`login_attempts.txt`) pour déceler une activité inhabituelle.

## Comment se prémunir ?

> Réfléchir à des solutions mais surtout lire la documentation publiée par l'OWASP (par exemple). Difficile de penser à toutes les implications d'une stratégie de défense, utiliser l'expérience commune et partagée par les autres !

> Étudier quelques mécanismes de défense

### Bloquer temporairement un compte

> Lister les avantages et inconvénients de cette défense

#### Avantages

#### Inconvénients

## Implémentation d'une solution

> Implémenter une solution minimale pour se prémunir de l'attaque (fixer la faille de sécurité de votre démo)

## Références

- [Brute Force Attack](https://owasp.org/www-community/attacks/Brute_force_attack), document de référence sur ce type d'attaque publié par l'*Open Worldwide Application Security Project (OWASP)*
- [Blocking Brute Force Attacks](https://owasp.org/www-community/controls/Blocking_Brute_Force_Attacks), stratégies pour se défendre d'une attaque brute force, publié par l'OWASP
- [OWASP Cheat Sheet Series](https://cheatsheetseries.owasp.org/index.html), des synthèses sur les moyens de se protéger des attaques principales
- [Force brute (attaque informatique)](https://www.cnil.fr/fr/definition/force-brute-attaque-informatique), publié par la CNIL