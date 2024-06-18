# Checklist(s)

- [Checklist(s)](#checklists)
  - [Checklist sécurité pour les *Développeur·ses* web](#checklist-sécurité-pour-les-développeurses-web)
  - [Références utiles](#références-utiles)


> Cette checklist n'est pas exhaustive mais permet de se prémunir déjà contre de nombreuses failles

## Checklist sécurité pour les *Développeur·ses* web

- **Tous les *inputs* sont vérifiés** (validés, filtrés) *avant* d'être utilisés []
- **Tous les *inputs* sont _échappés_** de manière appropriée au contexte (HTML, SQL, etc.) []
- Tout test de validité fait côté client est également fait côté serveur []
- Aucune requête SQL n'est construite par concaténation avec des *inputs* mais utilise des requêtes préparées et paramétrées []
- Aucune donnée sensible (nom de serveur, nom d'utilisateur, mot de passe, token, etc.) n'est présente dans le code []
- Aucune donnée sensible n'est publiée sur un dépôt et n'est présente dans l'historique des commits []
- Aucune donnée sensible n'est présente dans le *web root folder* (dossier hébergeant le site web) []
- Les messages d'erreur ne donnent pas trop d'informations à un agent malveillant []
- Les exceptions sont *toutes* interceptées []
- Aucun composant ne se connecte à un serveur SQL en utilisant le compte administrateur []
- L'utilisateur SQL utilisé par l'application dispose des *privilèges minimum* (base de données, tables, instruction SQL) []
- L'octroi de privilège pour réaliser une opération est justifié, il n'y a pas d'alternative []
- Une clef secrète de chiffrement n'est pas accessible
- Les solutions de chiffrement sont basées sur des bibliothèques *vendor* valides et non sur du code *fait maison* []
- Aucune *stacktrace* n'est fournie à des utilisateur inconnus []
- La génération de nombre aléatoire (par exemple pour la génération de mot de passe) doit générer des nombres équitablement distribués et être imprévisible. [Voir le tableau des fonctions à éviter et à utiliser pour chaque environnement](https://cheatsheetseries.owasp.org/cheatsheets/Cryptographic_Storage_Cheat_Sheet.html) []
- Toute opération nécessitant les privilèges est journalisée (ce qui inclue les tentatives d'authentification réussies et échouées) []
- Une nouvelle demande d'authentification (par exemple délivrance d'un nouveau token) est émise lorsqu'une action demande un privilège plus élevé []
- Tout usage de *secret* est journalisé (par qui, quand, pourquoi) []
- Si des données sensibles sont échangées entre le serveur et le client, la communication utilise le protocole [TLS](https://fr.wikipedia.org/wiki/Transport_Layer_Security) (SSL) []
- Tout formulaire de soumission de données sur une URL protégée par authentification utilise un token CSRF unique et imprévisible []
- Les cookies *sensibles* (ex : identifiant de session) sont déposés *par défaut* avec les attributs [`SameSite=Strict`](https://developer.mozilla.org/fr/docs/Web/HTTP/Headers/Set-Cookie#samesitesamesite-value), [`HttpOnly`](https://developer.mozilla.org/fr/docs/Web/HTTP/Headers/Set-Cookie#httponly) et [`Secure`](https://developer.mozilla.org/fr/docs/Web/HTTP/Headers/Set-Cookie#secure) []
- Aucun input n'est donné directement à une fonction de l'API du système de fichiers []
- Les valeurs des attributs des balises HTML sont [encodés](https://cheatsheetseries.owasp.org/cheatsheets/Cross_Site_Scripting_Prevention_Cheat_Sheet.html#output-encoding-for-html-attribute-contexts) et placés entre quotes []
- Aucune donnée sensible n'est conservée en claire en base de données []
- Le système utilise des algorithmes de *hashage* robustes comme [Argon2](https://fr.wikipedia.org/wiki/Argon2), [scrypt](https://fr.wikipedia.org/wiki/Scrypt) ou [bcrypt](https://fr.wikipedia.org/wiki/Bcrypt) []
- Le système utilise des algorithmes de chiffrement robustes comme [AES 256 bits](https://fr.wikipedia.org/wiki/Advanced_Encryption_Standard) (128 minimum) []
- Le système utilise [un *salt*](https://cheatsheetseries.owasp.org/cheatsheets/Password_Storage_Cheat_Sheet.html#salting) (dynamique ou statique) pour ses opérations de *hashage* []
- Le système n'utilise pas de générateur aléatoire non sécurisé (ex: `rand()` en C, `Math.random()` en Java, `random()` en Python, etc.) []
- Etc.


## Références utiles

- Annexes C et D de *Writing secure code, 2nd edition, p 729-731* (voir bibliographie fournie);
- [OWASP Cheat Sheet Series](https://cheatsheetseries.owasp.org/), des synthèses sur les différents types d'attaque et sur leur prévention
- [File upload security and good practices checklist](https://github.com/dilaouid/shitshit/blob/main/backend-good-practices-security/FILE_UPLOAD.md), une checklist de bonnes pratiques concernant l'*upload* (téléversement) de fichiers vers votre serveur