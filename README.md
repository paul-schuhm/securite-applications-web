# securite-applications-web


## Commande pour lancer une application php avec Docker

~~~bash
docker run --rm -v $(pwd)/index.php:/app/index.php -w /app php:8.2-cli php -S localhost:8089 index.php
~~~
