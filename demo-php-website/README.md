# Démo site web php

Application web PHP dockerisé.

## Lancer le projet

~~~bash
docker build -t phpapp .
docker run -p 8990:80 phpapp
~~~

> Pour arrêter le serveur : Ctr+c dans le terminal

Se rendre à l'URL `http://localhost:8990`