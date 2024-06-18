<?php

session_start();

$_SESSION['user'] = 'jdoe';
$_SESSION['isLoggedIn'] = true;
$_SESSION['name'] = 'John Doe';
//On génère une chaîne imprévisible de 128 caractères, c'est notre csrf_token ou non
$_SESSION['csrf_token'] = bin2hex(random_bytes(128));

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

    <!-- L'attaque peut marcher avec une requete GET (balise a) ou POST (form) 
    On peut placer le csrf token en argument de l'URL-->
    <!-- <a href="delete.php?csrf_token=....">Supprimer toutes mes données</a> -->

    <form action="delete.php" method="post">
        <!-- On place la valeur générée coté serveur dans un input caché pour qu'elle soit soumise avec le form -->
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>"/>
        <input type="submit" name="delete-my-data" value="Supprimer mes données">
    </form>

    <blockquote>Sur cette page, un cookie est déposé pour démarrer une session. Si vous souhaitez supprimer le cookie ou le rendre inutile pour tester le comportement du site web, rendez-vous dans les dev tools Stockage/Cookies et supprimer le cookie <code>PHPSESSID</code> ou modifier sa valeur.</blockquote>

</body>

</html>