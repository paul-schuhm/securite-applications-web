# Démo : Attaque Cross Site Request Forgery (CSRF)

Les attaques CSRF exploitent la confiance qu'un site web a envers un client. Dans ces attaques, l'attaquant *trompe* le client pour qu'il exécute une commande sur un site web qui fait confiance à ce client (i.e où le client est authentifié, généralement via un cookie).

La démo contient :

- [Un site vulnérable (`www-insecure`)](./www-insecure/);
- [Un site sécurisé (`www-secure`)](./www-secure/);
- [Un site attaquant (`www-evil`)](./www-evil/)

## Lancer la démo

### Comportement normal

Lancer le site *vulnérable* :

~~~bash
php -S localhost:5001 -t www-insecure
~~~

Se rendre à l'URL http://localhost:5001 et tester le comportement normal de l'application. Regarder le code source pour comprendre ce qu'il se passe. 

> Suggestion d' exercice : Reproduire la démo dans votre technologie web préférée (Java, Python, Node.js, etc.)

### Attaque

Lancer le site *attaquant* :

~~~bash
php -S localhost:5002 -t www-evil
~~~

Se rendre à l'URL http://localhost:5002. 

Ce site malveillant propose un formulaire sur sa page qui est *en fait* un formulaire qui post vers le site cible (`www-insecure`). Si l'attaquant parvient à amener l'utilisateur à *cliquer* sur le bouton, l'utilisateur se retrouve à effectuer une requête indésirée qui supprime toutes ses données. L'attaque fonctionne car le cookie permettant d'authentifier l'utilisateur sur `www-insecure` est *automatiquement* envoyé avec le requête `POST` associée au domaine.

Quand un cookie est *set* (déposé) il a **un nom, un domaine et un path**, différent de l'*origine* définie par la la *Same Origin Policy* (SOP) (scheme, domain, port). Un cookie déposé par un domaine est *accessible à ce domaine et à tous ses sous-domaines* !

> Les cookies sont *l'enfant pauvre de la sécurité sur le web*. Inventé par Netscape en 1994, au départ un outil en interne. Pas un standard, **crée avant la Same Origin Policy (SOP)**. L'introduction des cookies n'a pas été largement connue du grand public pour autant. En particulier, les cookies étaient acceptés par défaut dans les paramètres des navigateurs, et les utilisateurs n'étaient pas informés de leur présence. Certaines personnes étaient au courant de l'existence des cookies au début de l'année 1995, mais le grand public n'apprit leur existence qu'après la publication par le Financial Times d'un article le 12 février 1996. 

L'attaquant doit se contenter de fournir un formulaire *factice* sur une page web quelconque. Si l'URL attaquée fonctionne sur la méthode HTTP `GET` il peut se contenter d'envoyer un lien dans un e-mail (par exemple ici `<a href="http://localhost:5001/delete.php">Cliquez ici</a>`) ou, encore mieux, via une image de taille nulle `<img src="http://localhost:5001/delete.php" width="0" height="0" border="0">` qui émet une requête `GET` automatiquement dans le client mail à l'ouverture de l'e-mail.

> Suggestion d' exercice : reproduire l'attaque en utilisant cette fois la méthode `GET`

### Défense

Pour se prémunir contre les attaques CSRF, la méthode la plus efficace est l'utilisation de token CSRF ou parfois appelés [nonce](https://fr.wikipedia.org/wiki/Nonce_(cryptographie)). Il suffit de générer un nombre (ou une chaîne de caractère) arbitraire et dont la valeur est imprévisible qui ne sera utilisé qu'une seule fois. Ce nombre est fourni au client et conservé côté serveur. Lorsque l'utilisateur authentifié soumet une requête au client on vérifie que le nonce est présent et que sa valeur est correcte (émise par le serveur). Si c'est le cas on valide la requête, sinon on la rejette.

Avec cette simple protection, l'attaquant ne peut pas (*ou très difficilement*) forger une requête via un form et le donner à un utilisateur. Car il ne connaît pas la valeur du token. Seul le site exposant la ressource (`/delete.php` ici) ou fournissant le formulaire la connaît.

Arrêter le site vulnérable et lancer le site sécurisé (avec le même port) :

~~~bash
php -S localhost:5001 -t www-secure
~~~

Essayer à nouveau l'attaque en soumettant le formulaire fourni malicieusement par le site attaquant. Il ne peut plus réussir. Pour cela, l'attaquant doit connaître à l'avance la valeur d'un token de 128 caractères à usage unique.

La protection par CSRF token ou nonce est un mécanisme *très efficace*. Elle peut être [complétée par d'autres méthodes](https://cheatsheetseries.owasp.org/cheatsheets/Cross-Site_Request_Forgery_Prevention_Cheat_Sheet.html).

## Conclusion

Toute URL (ressource) protégée par authentification sur laquelle il est possible de soumettre des données (formulaire `POST`) **doit implémenter un mécanisme de protection contre les attaques CSRF**, au minimum *via* un token CSRF.

## Références

- [Cross-site request forgery](https://fr.wikipedia.org/wiki/Cross-site_request_forgery), article Wikipédia très bien fait pour introduire l'attaque
- [OWASP CSRF](https://owasp.org/www-community/attacks/csrf), documentation de l'attaque CSRF par l'OWASP
- [Cross-Site Request Forgery Prevention Cheat Sheet](https://cheatsheetseries.owasp.org/cheatsheets/Cross-Site_Request_Forgery_Prevention_Cheat_Sheet.html), conseils de l'OWASP pour prémunir les attaques CSRF
