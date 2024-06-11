# Sécurité des applications web

Sources du module Sécurité des applications web

- [Sécurité des applications web](#sécurité-des-applications-web)
  - [Démos](#démos)
  - [Checklists](#checklists)
  - [Lexique](#lexique)
  - [Bibliographie](#bibliographie)
    - [Ouvrages](#ouvrages)
    - [Références/Standards/Audits](#référencesstandardsaudits)
    - [Outils](#outils)
    - [Articles / Sur le web](#articles--sur-le-web)
    - [Conférences/Talks/Vidéos](#conférencestalksvidéos)
    - [Légende bibliographie](#légende-bibliographie)


## Démos

- [Accéder à la démo live sur le traitement des données (validation, sanitize, escape)](./demo-live-validation-escape-sanitize/)
- [Accéder à la démo commentée et documentée sur le traitement des données (validation, sanitize, escape)](./demo-commentee-validation-escape-sanitize/)
- [Accéder à la démo Attaque Brute Force un système d'authentification](./demo-brute-force/), exemple de mini-projet illustrant un type d'attaque. S'en servir de base (plan) pour documenter une autre faille


## Checklists

> À venir

## Lexique

> À venir

## Bibliographie

> Sera complétée d'ici la fin du cours

Ressources pour approfondir le module *Sécurité des applications web*.

### Ouvrages

- [Essential PHP Security](https://www.oreilly.com/library/view/essential-php-security/059600656X/), de Shiflett, publié chez O'Reilly, 2005. LP++
- [The Web Application Hackers Handbook](https://www.amazon.fr/Web-Application-Hackers-Handbook-Exploiting/dp/1118026470), de  Dafydd Stuttard et Marcus Pinto, publié chez John Wiley & Sons Inc, 2011. LE+
- [Hacking: The Art of Exploitation, 2nd Edition](https://www.amazon.fr/dp/1593271441/), de Jon Erickson, publié chez No Starch Press, 2008. LE++
- [Writing secure code, 2nd edition](https://www.amazon.com/Writing-Secure-Second-Developer-Practices/dp/0735617228), de  Michael Howard et David LeBlanc, publié chez Microsoft Press, 2003. LP++
- [Threat Modeling: Designing for Security, 1st Edition ](https://www.amazon.fr/Threat-Modeling-Designing-Adam-Shostack/dp/1118809998), d'Adam Shostack, publié chez Wiley, 2014. LI++. Voir également l'introduction au *threat modeling* dans le chapitre 4 de *Writing Secure code* 
- [Web Security For Developers](https://www.amazon.fr/Web-Security-Developers-Malcolm-McDonald/dp/1593279949), de Malcolm Macdonald, publié chez No Starch Press, 2020. Introduction/Overview, couvre les menaces principales, pédagogique. Bien pour faire un tour d'horizon sans rentrer trop dans les détails et trouver des sujets à approfondir ensuite. LI
- [Sécurité des applications web  : Stratégies offensives et défensives](https://www.editions-eni.fr/livre/securite-des-applications-web-strategies-offensives-et-defensives-9782409045127), de Malween LE GOFFIC, publié chez ENI Éditions, 2024. LI+

### Références/Standards/Audits

- [OWASP Top Ten : Top 10 Web Application Security Risks](https://owasp.org/www-project-top-ten/), document standardisé des risques de sécurité des applications web. Liste et classifie l'ensemble de risques reconnus comme critiques pour les applications web 
- [Common Weakness Enumeration (CWE)](https://cwe.mitre.org/about/index.html), un groupe de travail qui maintient une liste des vulnérabilités connues des software et hardware
- [OWASP : Attacks](https://owasp.org/www-community/attacks/), la liste des attaques les mieux connues
- [OWASP Cheat Sheet Series](https://cheatsheetseries.owasp.org/), des synthèses sur les différents types d'attaque et leur prévention
- [Sécurité : Chiffrement, hachage, signature ](https://www.cnil.fr/fr/securite-chiffrement-hachage-signature), publié par la CNIL
- [NIST Special Publication 800-63B : Digital Identity Guidelines, Authentication and Lifecycle Management](https://pages.nist.gov/800-63-3/sp800-63b.html), document de référence publié par [le National Institute of Standards and Technology (NIST)](https://fr.wikipedia.org/wiki/National_Institute_of_Standards_and_Technology) sur les recommandations liées à la gestion de l'identité en ligne et des systèmes d'authentification. 
- [RFC 7519 : JSON Web Token (JWT)](https://datatracker.ietf.org/doc/html/rfc7519), publié par l'IETF. Le document décrivant le standard JWT

### Outils

- [DAMN VULNERABLE WEB APPLICATION (DVWA)](https://github.com/digininja/DVWA), une application web PHP/MySQL extrêmement vulnérable. Son objectif principal est d'aider les professionnels de la sécurité à tester leurs compétences et leurs outils dans un environnement légal, d'aider les développeurs web à mieux comprendre les processus de sécurisation des applications web et d'aider à la fois les étudiants et les enseignants à apprendre la sécurité des applications web dans un environnement de classe contrôlé. [Regarder sur YouTube des usages du projet](https://www.youtube.com/results?search_query=Damn+Vulnerable+Web+Application+)
- [hydra](https://www.kali.org/tools/hydra/), Hydra est un programme de craquage de mot de passe parallélisé qui supporte de nombreux protocoles pour attaquer
- [Dépôt : démo Same Origin Policy](https://github.com/paul-schuhm/demo-same-origin-policy), une démo de la Same Origin Policy
- [Dépôt : démo JWT Authentification](https://github.com/paul-schuhm/demo-jwt), une démo de l'implémentation du standard JWT
- [KeePassXC Application Security Review](https://molotnikov.de/keepassxc-review), de [Zaur Molotnikov](https://molotnikov.de/cv). Un audit du gestionnaire de mots de passe open source [KeePassXC](https://github.com/keepassxreboot/keepassxc). Contient de nombreuses informations utiles sur son fonctionnement et ses détails d'implémentation. [Télécharger le PDF (version 1.2)](https://molotnikov.de/docs/KeePassXC-Review-V1-Molotnikov.pdf)
- [Xkpassword](https://beta.xkpasswd.net/), générateur de mots de passe basé sur [le comic *Password Strength* d'xkcd](https://xkcd.com/936/)


### Articles / Sur le web

- [74 % des cyberattaques sont causées par des facteurs humains, notamment des erreurs](https://securite.developpez.com/actu/355251/74-pourcent-des-cyberattaques-sont-causees-par-des-facteurs-humains-notamment-des-erreurs-le-vol-d-informations-d-identification-l-utilisation-abusive-de-privileges-d-acces-ou-l-ingenierie-sociale/)
- [Des dépendances imaginaires aux conséquences réelles : l'IA invente des noms de logiciels et les devs les téléchargent](https://intelligence-artificielle.developpez.com/actu/355826/Des-dependances-imaginaires-aux-consequences-reelles-l-IA-invente-des-noms-de-logiciels-et-les-devs-les-telechargent-des-dependances-logicielles-fictives-ont-ete-integrees-dans-des-projets-reels/)
- [Dangers du chiffrement (cryptage) des données d'une base de données MySQL/MariaDB ](https://www.developpez.net/forums/blogs/3170-sqlpro/b10593/dangers-chiffrement-cryptage-donnees-base-donnees-mysql-mariadb/), de Frédéric Brouard, 2024
- [Des chercheurs ont découvert que le modèle d'IA GPT-4 d'OpenAI est capable de pirater des sites web et de voler des informations dans des bases de données en ligne sans aide humaine](https://intelligence-artificielle.developpez.com/actu/355391/Des-chercheurs-ont-decouvert-que-le-modele-d-IA-GPT-4-d-OpenAI-est-capable-de-pirater-des-sites-web-et-de-voler-des-informations-dans-des-bases-de-donnees-en-ligne-sans-aide-humaine/), sur développez.com
- [La sécurité des conteneurs, qu'est-ce que c'est ?](https://www.redhat.com/fr/topics/security/container-security), un très bon article de RedHat sur la sécurité des conteneurs, de l'application conteneurisée à l’infrastructure sur laquelle le conteneur est déployée
- [Why Forced Password Changes Reduce Security](https://kevquirk.com/why-forced-password-changes-reduce-security/),de Kev Quirk, ingénieur en sécurité depuis plus de 10 ans
- [Don’t try to sanitize input. Escape output.](https://benhoyt.com/writings/dont-sanitize-do-escape/), de Ben Hoyt. Pourquoi faut-il préférer l'échappent au filtrage des input et quels impacts sur la sécurité
- [Parcoursup : cachez ces vulnérabilités que je ne saurais voir !](https://www.zdnet.fr/actualites/parcoursup-cachez-ces-vulnerabilites-que-je-ne-saurais-voir-39964054.htm), un bel exemple de *sécurité par obscurité*
- [Threat Modeling](https://fr.wikipedia.org/wiki/Mod%C3%A8le_de_menace)
- [Threat Modeling Cheat Sheet](https://cheatsheetseries.owasp.org/cheatsheets/Threat_Modeling_Cheat_Sheet.html), publié par l'OWASP
- [File upload security and good practices checklist](https://github.com/dilaouid/shitshit/blob/main/backend-good-practices-security/FILE_UPLOAD.md), une checklist de bonnes pratiques concernant l'upload (téléversement) de fichiers vers votre serveur
- [xkcd explained : 936: Password Strength](https://www.explainxkcd.com/wiki/index.php/936:_Password_Strength)

### Conférences/Talks/Vidéos

- [Building the ultimate login and signup](https://www.youtube.com/watch?v=E25KxLKwY-M&list=PLS3XEhTy6-Ale8Et6pxRR2I3LYNt8-rX3&index=18&t=1270s), vous pensiez que construire un formulaire de connexion/inscription sécurisé à une application web est nue tâche triviale ? Ici vous verrez que non, un décorticage méthodique de toutes les potentielles failles de sécurité à prévoir quand on design un système d'authentification. Donné par Matt Cotterelll, un ingénieur en sécurité basé en Nouvelle Zélande
- [Same-origin policy: The core of web security, OWASP Wellington](https://www.youtube.com/watch?v=zul8TtVS-64&list=PLS3XEhTy6-Ale8Et6pxRR2I3LYNt8-rX3&index=138), [la *Same Origin Policy (SOP)*](https://fr.wikipedia.org/wiki/Same-origin_policy) merveilleusement bien expliquée. La vidéo de référence sur le sujet. Une spécification implémentée par les navigateurs, à connaître (au moins vaguement) pour tous les développeurs (front ou back)
- [Running an SQL Injection Attack - Computerphile ](https://www.youtube.com/watch?v=ciNHn38EyRc), une excellent démo d'injection SQL didactique, de Mike Pound, sur la très bonne chaîne [Computerphile](https://www.youtube.com/@Computerphile)
- [Never click on a Link!](http://talks.php.net/show/penguicon1/1), slides de la présentation de Rasmus Lerdorf sur la sécurité d'une application web (PHP)


### Légende bibliographie

- *LP* : Livre Parcouru
- *LE* : Livre Évoqué (entendu parler)
- *LI* : Livre Inconnu
- "+" : Recommandé
- "++" : Fortement recommandé
- "-" : Peu recommandé (rare que je la mentionne)
- "--" : Non recommandé (rare que je la mentionne)

> Inspiré de [Comment parler des livres que l'on a pas lu ?](http://www.leseditionsdeminuit.fr/livre-Comment_parler_des_livres_que_l_on_n_a_pas_lus__-2514-1-1-0-1.html), de Pierre Bayard, publié chez Éditions de Minuit, 2007