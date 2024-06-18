# Lexique

Liste des définitions des termes, concepts utilisés dans le cours, dans le domaine de la sécurité informatique.

- [Lexique](#lexique)
  - [Auditabilité (*Audit*)](#auditabilité-audit)
  - [Authentification](#authentification)
  - [Cohérence (*Consistency*)](#cohérence-consistency)
  - [Confidentialité (*Confidentiality*)](#confidentialité-confidentiality)
  - [Disponibilité (*Availability*)](#disponibilité-availability)
  - [Échappement (*Escape*)](#échappement-escape)
  - [Donnée entrante (*Input*)](#donnée-entrante-input)
  - [Faille](#faille)
  - [Filtrage/Assainissement (*Sanitize*)](#filtrageassainissement-sanitize)
  - [Intégrité (*Data Integrity*)](#intégrité-data-integrity)
  - [Identification](#identification)
  - [Isolation](#isolation)
  - [Privilège](#privilège)
  - [Risque (*Threat*)](#risque-threat)
  - [Sécurité](#sécurité)
  - [Sûreté](#sûreté)
  - [Validation (*Validate*)](#validation-validate)


## Auditabilité (*Audit*)

> Type de sécurité

S'assurer qu'il est possible de déterminer la cause d'un problème, d'une panne, d'un bug. Le système génère des données incorruptibles sur son activité (*logs*) permettant d'identifier les utilisateurs et les actions effectuées pour aider à :

- Établir les responsabilités;
- Déterminer les dommages causés;
- Remettre le système dans un état correct (restaurer)

## Authentification

*Procédure* par laquelle le système reconnaît que l'agent est bien celui qu'il prétend être.

## Cohérence (*Consistency*)

> Type de sécurité

S'assurer que le système se comporte comme attendu (pas de *bugs*).

## Confidentialité (*Confidentiality*)

> Type de sécurité

S'assurer que les informations sont protégées contre leur lecture par des personnes qui n'ont pas été explicitement autorisées à le faire par le propriétaire de cette information.


## Disponibilité (*Availability*)

> Type de sécurité

S'assurer que le système est protégé contre la dégradation ou l'indisponibilité (crash) sans autorisation


## Échappement (*Escape*)

Stratégie de sécurisation d'un [input](#input) à l'écriture. 

Le code qui manipule la donnée entrante s'assure de neutraliser tous les caractères spéciaux qu'elle pourrait contenir pour la rendre inoffensive dans son contexte d'utilisation, *sans la modifier*.

## Donnée entrante (*Input*)

- Toute donnée provenant de l'*extérieur* du système (client HTTP, base de données, fichiers sur le disque, mémoire, etc.);
- Donnée entrante dans le système;

> All input is evil !

## Faille

- Discontinuité de terrain (fracture, cassure);
- Point faible, défaut, manque de cohérence dans un raisonnement, une structure, un système;
- (De sécurité) Vulnérabilité dans un système d'information logiciel ou matériel qui peut :
  - Être exploitée par des attaquants pour compromette la [sécurité](#sécurité) du système (accéder à des données confidentielles, modifier ou supprimer des données, du code ou des programmes, agir sans autorisation);
  - Avoir des conséquences négatives sur le système, les données et la réputation d'une organisation (panne, perte de données, non respect de la réglementation, accident interne, etc.)

> Synonyme : défaut, faiblesse, lacune

## Filtrage/Assainissement (*Sanitize*)

Stratégie de sécurisation d'un [input](#input). 

Altérer, modifier une donnée entrante pour lui *retirer* tout aspect dangereux (caractères spéciaux et réservés).

> A ses limites : en effet, aucune donnée n'est "intrinsèquement" dangereuse, cela dépend dans quel contexte elle est manipulée et à quoi elle sert. Préférer la validation et l'échappement quand c'est possible.

## Intégrité (*Data Integrity*)

> Type de sécurité

S'assurer que l'information (y compris le code source) est protégé contre l'altération ou suppression sans la permission du propriétaire de cette information (comprend aussi la documentation, la base de données, les backups, les logs)

## Identification

*Procédure* par laquelle le système reconnaît que l'agent est connu du système.

## Isolation 

> Type de sécurité

S'assurer que *les accès au système sont régulés*. Chaque agent (*profil*) dispose des privilèges minimums requis pour utiliser le système.

## Privilège

Autorisation octroyée à un agent authentifié d'effectuer une action.

> Synonyme : autorisation, permission

## Risque (*Threat*)

- Possibilité, *probabilité* d'un fait, *évènement* considéré comme un mal ou un dommage;
- Menace, danger, inconvénient plus ou moins probable auquel on est exposé;

## Sécurité

- *Situation* dans laquelle quelqu'un, quelque chose n'est exposé à aucun danger, à aucun [risque](#risque-threat), en particulier d'une agression physique, d'accident, de vol ou de détérioration;
- Absence ou limitation de [risques](#risque-threat) dans un domaine précis

> Synonyme : sûreté

## Sûreté

- Caractère précis, efficace de quelqu'un ou de quelque chose sur lequel on peut compter d'une façon certaine;

> Synonyme : fidélité, infaillibilité, précision

## Validation (*Validate*)

Stratégie de sécurisation d'un [input](#input). 

Cette *procédure* vérifie que la valeur est présente et est une valeur renseignée dans une liste de valeurs acceptées (*white list*), définie par un domaine de validité, par un *pattern* ou par *parsing* (chaîne JSON valide, chaîne représente bien un entier, délégation au constructeur d'un objet etc.).

Lors de la validation, la donnée entrante *n'est pas altérée*, elle est *comparée* à un ensemble de valeurs admises définies par le serveur.

C'est la stratégie la plus puissante de sécurisation.












