<?php
/**
 * L'utilisateur est authentifié, on dépose un cookie
 * qui permet de l'identifier de manière unique.
 * Supposons que son compte soit associé à l'identifiant jdoe (pour John Doe)
 * session_start() dépose un cookie PHP "PHPSESSID" 
 * dont la valeur est un identifiant unique généré par PHP.
 * 
 * Pour voir le cookie dans le navigateur, ouvrir devtools/Stockage/Cookies
 */
session_start();

/**
 * On attache des données (ici user=jdoe) sous forme de clef/valeur à la session (i.e à la valeur de PHPSESSID)
 * Cette donnée est conservée côté serveur (en mémoire ou sur le disque, il y a plusieurs options).
 */
$_SESSION['user'] = 'jdoe';
$_SESSION['isLoggedIn'] = true;
$_SESSION['name'] = 'John Doe';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Site WWW (cible)</h1>

    <!-- L'attaque peut marcher avec une requete GET (balise a) ou POST (form) -->
    <!-- <a href="delete.php">Supprimer toutes mes données</a> -->

    <form action="delete.php" method="post">
        <input type="submit" name="delete-my-data" value="Supprimer mes données">
    </form>

    <blockquote>Sur cette page, un cookie est déposé pour démarrer une session. Si vous souhaitez supprimer le cookie ou le rendre inutile pour tester le comportement du site web, rendez-vous dans les dev tools Stockage/Cookies et supprimer le cookie <code>PHPSESSID</code> ou modifier sa valeur.</blockquote>

</body>

</html>