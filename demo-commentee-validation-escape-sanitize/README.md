# Démo : Validation, escape, sanitize. *101* de la sécurisation des applications web

- [Démo : Validation, escape, sanitize. *101* de la sécurisation des applications web](#démo--validation-escape-sanitize-101-de-la-sécurisation-des-applications-web)
  - [Techniques de base de sécurisation des données entrantes (input)](#techniques-de-base-de-sécurisation-des-données-entrantes-input)
  - [Identification, authentification et autorisation](#identification-authentification-et-autorisation)
  - [Bonnes pratiques générales](#bonnes-pratiques-générales)
  - [Validate (*white list*)](#validate-white-list)
    - [Pros](#pros)
    - [Cons](#cons)
  - [Escape](#escape)
    - [Pros](#pros-1)
    - [Cons](#cons-1)
  - [*Sanitize*/Purger/Nettoyer](#sanitizepurgernettoyer)
    - [Pros](#pros-2)
    - [Cons](#cons-2)
  - [Lancer le projet](#lancer-le-projet)
  - [Liens utiles](#liens-utiles)


Une démonstration des trois techniques fondamentales de gestion des données entrantes dans une application web :

- La validation (validate);
- L'échappement (escape);
- La sanitization (sanitize)

## Techniques de base de sécurisation des données entrantes (input)

> All inputs are evil !

Par définition, tout ce qui se passe côté client est public et **ne peut pas être sécurisé**. C'est donc au serveur de vérifier toute donnée entrante provenant de l’extérieur (client, base de données, requête à une API, fichiers, etc.). 

Le serveur **doit vérifier toute donnée** soumise via une requête `GET` (paramètres d'URL) ou `POST` (corps de la requête) **avant** de les manipuler et de les utiliser pour réaliser le service attendu. 

Pour **sécuriser les données entrantes** dans le service web, il existe trois stratégies (qui peuvent se compléter) :

- **La validation** : la valeur est soumise (présente) et doit est égale à une valeur énumérée dans une liste de valeurs acceptées (*white list*) (exemple : un `select`). Peut être aussi le résultat d'un *parsing* (chaîne JSON valide, chaîne représente bien un entier, instanciation d'un objet à partir des données fournies et laisser agir le constructeur/exceptions comme "validateur", etc.) ou d'un pattern matching par expression régulière (à utiliser avec précaution !). **Le cas idéal**, **à privilégier dès que possible**. S'applique sur :
  - Les listes de choix
  - Un domaine de validité bien défini (par exemple un nombre paire, ou un nombre compris entre 0 et 100, etc.)
  - Un pattern/format strict attendu
- **L'échappement** : Lorsque la donné est écrite quelque part, sur un document HTML, dans une base de données, etc. **le code qui manipule les données s'assure de neutraliser tous les caractères spéciaux pour rendre la donnée inoffensive dans son contexte**, *sans modifier la donnée originale*;
- **La *sanitization*/le filtrage** : *altérer*, modifier les données entrantes pour leur retirer tout aspect dangereux (caractères spéciaux). **A ses limites, à utiliser avec parcimonie**. Il n'y a pas de caractères dangereux *par essence*, **cela dépend toujours du contexte d'utilisation**. Par exemple, la valeur `<script>//Some evil JS</script>` est dangereuse dans le contexte d'une page HTML, mais inoffensive dans le contexte d'une requête SQL.

## Identification, authentification et autorisation

- **Identification** : Est-ce que le système vous connaît ?
- **Authentification** : Est-ce que vous êtes bien l'utilisateur/le client que vous prétendez être ?
- **Autorisation** : Est-ce que vous avez la permission (ou privilège) d'effectuer cette action ?


## Bonnes pratiques générales

- **Identifier** clairement les données qui proviennent de l'extérieur, et sont potentiellement dangereuses pour votre service, et les distinguer de celles qui ont été validées. Mettre en place une convention d'écriture dans votre code (par exemple la variable `$clean` représente les données inoffensives dans le script PHP);
- Dans les formulaires, **préférer toujours des questions fermées, quand c'est possible** (choix parmi une liste de valeurs admises) : `select`, `checkbox`, `radio buttons`.  Fermer au maximum les questions que vous posez aux clients pour améliorer l'experience utilisateur et la sécurité de votre service;
- **Créer un dictionnaire des données** pour identifier les données nécessaires pour mener à bien votre logique métier (rendre votre service au client) et les contraintes qui pèsent sur elles (pour dériver votre logique de validation). Voici un template utile :

| Libellé  | Identifiant (système)  | Type  | Requis ?   | Commentaires/Contraintes  |
|---|---|---|---|---|
| Nombre d'accompagnants | `nb-acc`  | N  | Oui  | Doit être égal à 0, 1 ou 2.  |

> Légende Type : **A**lphabétique, **N**umérique, **A**lpha**N**umérique, **B**ooléen, **D**ate (time)

- Lorsque vous développez vos formulaires, ne placez pas les contraintes (qui servent uniquement pour le confort du client) dans les inputs HTML directement afin de faciliter vos tests des inputs. **Implémenter *d'abord* les contraintes sur les inputs côté serveur**. Une fois que votre validation est *complètement* implémentée, ajouter les contraintes via des attributs HTML côté client (en utilisant éventuellement du Javascript pour des contraintes plus sophistiquées)
- **Échapper toujours les caractères** quand vous écrivez des **données externes** quelque-part (document JSON, HTML, requête SQL, etc.). Utiliser les règles d'échappement appropriés au contexte donné. Chaque contexte a son jeu de caractères réservés et potentiellement exploitables.

## Validate (*white list*)

La validation est le cas idéal et doit **être utilisée autant que possible**. Cela consiste à comparer la valeur fournie à une liste de valeurs acceptées. Si la valeur fournie n'est pas dans la liste ou dans un domaine de validité bien définie, elle est rejetée (*liste blanche*)

### Pros

- **Le plus sécurisé**. Le domaine de validité est bien défini, les données envoyées par le client ne sont pas directement manipulées ou altérées mais juste *comparées* aux valeurs admises. Le top.

### Cons

- Ne peut pas toujours s'appliquer. Que sur des inputs "fermés" (select, checkbox, radio buttons)

## Escape

**L'échappement est, avec la validation, le meilleur mécanisme de défense pour votre application**. Contrairement au filtrage (*sanitization*), l'échappement **ne modifie pas les données entrantes** mais s'assure que, **dans un contexte donné**, cette donnée soit utilisée de manière sécurisée en *échappant* (rendant inoffensif) les caractères jugés dangereux **pour ce contexte**.

### Pros

- **Responsabilité** : Chaque contexte de manipulation des données (script qui génère une page web, une requête SQL, etc.) est *responsable de ses propres failles de sécurité* et manipule les données avec précaution dans *son contexte*. Pas de "politique tout-en-un"

### Cons

- **Il ne faut pas oublier de le faire**. Pour des pages web, on préféra utiliser des moteurs de template qui échappent automatiquement et par défaut toutes les données imprimées sur la sortie, comme [Twig](https://twig.symfony.com/).

## *Sanitize*/Purger/Nettoyer

Lorsqu'il n'est pas possible de valider des données (un nom, un prénom par exemple), i.e quand le nombre possible de réponses est *impossible à déterminer à l'avance*, on peut ajouter une couche de *filtrage* des données. Filtrer (*sanitize*) les données consister **à modifier les données entrantes pour les rendre inoffensives, généralement en supprimant ou remplaçant des caractères**. Par exemple, en retirant tous les caractères spéciaux qui pourraient être utilisés pour former des balises HTML. Par exemple, si vous autorisez les clients à publier des posts en HTML (éditeur riche) vous pouvez définir une liste de balises HTML autorisées (a, p, img, etc.) et filtrer les autres (ce que fait GitHub ou StackOverflow par exemple)

### Pros

- Appliquer des règles complexes sur des inputs;
- S'assurer de l'absence de certains caractères identifiés *pour une raison bien définie*;
- Plus flexible pour l'utilisateur : si une partie des données n'est pas valide, au lieu de tout rejeter, on conserve les parties valides

### Cons

- **Limitée** : *Impossible* d'anticiper de manière exhaustive tous les inputs possibles;
- **Complexe** : Règles de filtrage peuvent être complexes et elles-même détournées et exploitées;
- Altère les inputs du client (*Intégrité des données* menacée);


## Lancer le projet

> Prérequis : [Installer PHP8+](https://www.php.net/downloads.php)

À la racine du projet :

~~~bash
php -S localhost:8990
~~~

> Remarque : On utilise [le serveur web interne de PHP](https://www.php.net/manual/fr/features.commandline.webserver.php), très utile pour le développement et de petits tests. Par défaut, PHP va servir tout le contenu du dossier courant et recherche un fichier `index.php` pour l'associer à l'URL racine `/`. Pour plus d'options, consulter le manuel de PHP (`man php` sur Unix)

Se rendre à l'URL `http://localhost:8990`

## Liens utiles

- [Never click on a link !](http://talks.php.net/show/penguicon1/0), talk de Rasmus Ledorf, auteur de la première version de PHP;
- [Don’t try to sanitize input. Escape output.](https://benhoyt.com/writings/dont-sanitize-do-escape/), de Ben Hoyt. Pourquoi faut-il préférer l'échappement au filtrage des input et quels impacts sur la sécurité;
- [Parse, don’t validate](https://lexi-lambda.github.io/blog/2019/11/05/parse-don-t-validate/), d'Alexis King;
- [File upload security and good practices checklist](https://github.com/dilaouid/shitshit/blob/main/backend-good-practices-security/FILE_UPLOAD.md), une checklist de bonnes pratiques concernant l'upload (téléversement) de fichiers vers votre serveur
- [Dépôt : démo de quelques fonctions utiles de sanitization des données en PHP](https://github.com/paul-schuhm/developpement-cote-serveur-php/blob/main/demos/web/fonctions-utiles-web.php)

