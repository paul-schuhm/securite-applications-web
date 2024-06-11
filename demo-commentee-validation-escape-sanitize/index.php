<?php

/**
 * Script qui génère la page web contenant le formulaire de 
 * prise de rendez-vous médical
 */

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendez-vous</title>
</head>

<body>
    <h1>Prendre un rendez-vous au cabinet</h1>

    <?php 
    $error = filter_input(INPUT_GET, 'error');
    ?>

    <?php if($error) : ?>
        <p style="color:red;">Votre rendez-vous n'a pas pu être pris car... Merci de réessayer.</p>
    <?php endif ; ?>



    <form action="handle-form.php" method="POST">

        <div>
            <label for="first-name">Prénom :</label>
            <input type="text" id="first-name" name="first-name" required value="John">
        </div>

        <div>
            <label for="last-name">Nom :</label>
            <input type="text" id="last-name" name="last-name" required value="Doe">
        </div>

        <div>
            <label for="date">Date :</label>
            <input type="date" id="date" name="date" required>
        </div>

        <label for="heure">Heure :</label>
        <input type="time" id="hour" name="hour" step="1800" value="08:00" min="08:00" max="17:00" title="Choisir un horaire entre 8:00 et 17:00" required>

        <div>
            <label for="reason">Motif du rendez-vous :</label>
            <select id="reason" name="reason" required>
                <option value="">Sélectionnez un motif</option>
                <option selected value="consultation">Consultation</option>
                <option value="follow-up">Suivi</option>
                <option value="urgency">Urgence</option>
                <option value="control">Contrôle</option>
                <option value="other">Autre</option>
            </select>
        </div>

        <div>
            <label for="nb-acc">Nombre d'accompagnateurs :</label>
            <input type="number" name="nb-acc" id="nb-acc" value="0" min="0" max="2" required>
        </div>


        <div>
            <p>Souhaitez-vous recevoir un rappel par SMS ?</p>
            <label for="reminder_yes">Oui</label>
            <input type="radio" id="reminder-yes" name="sms-reminder" value="yes" checked required>
            <label for="reminder_no">Non</label>
            <input type="radio" id="reminder-no" name="sms-reminder" value="yes" required>
        </div>

        <input type="submit" value="Prendre rendez-vous">
    </form>


    <script>
        //Formate la date au format YYYY-mm-ddTHH:mm:ss.lll et récupère la partie date uniquement
        const today = new Date().toISOString().split('T')[0];
        const dateElement = document.getElementById('date');
        dateElement.setAttribute('min', today);
        dateElement.setAttribute('value', today);

        //Vérifie avant la soumission (requête POST) que le jour du rendez-vous est 
        //un jour de la semaine. Annule la soumission et affiche un message d'erreur si non
        addEventListener("submit", (event) => {

            const selectedDate = new Date(dateElement.value);
            const day = selectedDate.getUTCDay();

            // 0 = Dimanche, 6 = Samedi
            if (day === 0 || day === 6) {
                alert('Veuillez sélectionner un jour de la semaine (du lundi au vendredi).');
                event.preventDefault();
            }
        });
    </script>

</body>

</html>