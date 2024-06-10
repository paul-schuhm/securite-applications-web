<?php

/**
 * Démo
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

    <h1>Prise de rendez-vous</h1>

    <form action="handle-form.php" method="POST">
        <div>
            <label for="first-name">Prénom :</label>
            <input type="text" name="first-name" id="first-name">
        </div>
        <div>
            <label for="last-name">Nom :</label>
            <input type="text" name="last-name" id="last-name">
        </div>
        <div>
            <label for="date">Date : </label>
            <input type="date" name="date" id="date">
        </div>
        <div>
            <label for="time">Heure : </label>
            <input type="time" name="time" id="time">
        </div>
        <div>
            <label for="age">Âge : </label>
            <input type="number" name="age" id="age" min="0" max="200" required>
        </div>
        <input type="submit" value="Réserver">
    </form>

</body>

</html>