<?php

/**
 * Démo minimale d'attaque brute-force sur un formulaire de login
 */

$error = filter_input(INPUT_GET, 'error');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Se connecter au service web</h1>

    <?php if (isset($error)) : ?>
        <p style="color:red;">Identifiants invalides, impossible de vous authentifier. Merci de réessayer</p>
    <?php endif; ?>

    <form action="login.php" method="POST">
        <label for="login">Identifiant : </label>
        <input type="text" name="login">
        <label for="login">Mot de passe : </label>
        <input type="password" name="password">
        <input type="submit" value="Se connecter">
    </form>
</body>

</html>