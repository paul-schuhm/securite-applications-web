<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rdv médical</title>
</head>

<body>

    <h1>Prendre un rendez-vous</h1>

    <form action="/handle.php" method="POST">
        <!-- Prénom -->
        <div>
            <label for="firstname">Prénom</label>
            <input type="text" id="firstname" name="firstname" value="Jane">
        </div>
        <div>
        <!-- Nom -->
            <label for="lastname">Nom</label>
            <input type="text" id="lastname" name="lastname" value="Doe">
        </div>
        <!-- Date -->
         <div>
            <label for="date">Date</label>
            <input type="date" name="date" id="date" value="2025-04-29">
         </div>
        <!-- Heure-->
        <div>
            <label for="time">Heure</label>
            <input type="time" name="time" id="time" value="10:30">
         </div>

         <!-- Motif -->
         <div>
            <label for="object">Motif de la visite</label>
            <select name="object" id="object">
                <option value="consultation" selected>Consultation</option>
                <option value="suivi">Suivi</option>
                <option value="urgence">Urgence</option>
                <option value="autre">Autre</option>
            </select>
         </div>

         <div>
            <label for="nb_acc">Nombre d'accompagnants</label>
            <input type="number" name="nb_acc" id="nb_acc" value="0">
         </div>

         <div>
            <label for="sms_reminder">Être rappelé.e par SMS ?</label>
            <input type="checkbox" name="sms_reminder" id="sms_reminder" checked value="yes">
         </div>

         <input type="submit" value="Prendre rendez-vous">

    </form>

</body>

</html>