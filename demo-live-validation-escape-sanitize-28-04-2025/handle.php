<?php

/**
 * Valide et traite le formulaire de prise de rendez-vous
 */

//Validation de données : Est-ce que la donnée est dans ma liste de valeurs admises ?

//Distinction entre les données générées par le système (mes données) et les données qui proviennent du monde exterieur.

//On va placer toutes les données sécurisées (?) dans $clean (distinguer)
$clean = [];

//1. Validation de la confirmation par SMS

//Contraintes : obligatoire, valeur 'yes' si le rappel est demandé

if (isset($_POST['sms_reminder'])) {
    //La donnée est présente et validée
    if ($_POST['sms_reminder'] === 'yes')
        $clean['sms_reminder'] = 'yes';
    else
        $clean['sms_reminder'] = 'no';
}

//2. Validation du nombre d'accompagnant/es ("procédurale")
$nbAccAccepted = [0, 1, 2];

$isNbAccompagnyingClean = isset($_POST['nb_acc']) &&
    ctype_digit($_POST['nb_acc']) &&
    in_array(intval($_POST['nb_acc']), $nbAccAccepted);

if ($isNbAccompagnyingClean) {
    $clean['nb_acc'] = $_POST['nb_acc'];
}

//Variante "déclarative" avec primitives PHP plus avancées 
//(dit pas comment on vérifier, on dit ce que l'on veut vérifier)
//Utiliser vos libs, frameworks préférées.
// $isNbAccompagnyingClean = filter_input(
//     INPUT_POST,
//     'nb_acc',
//     FILTER_VALIDATE_INT,
//     ['options' => ['min_range' => 0, 'max_range' => 2]]
// );

//3. Autre forme de validation : regex. Donnée respecte un pattern. Attention !! 
//Regex a utiliser avec beaucoup de précaution
//Heure : de 09:00 à 17:30, toutes les demi-heures
$time = $_POST['time'];
var_dump($time);
// Syntaxe : preg_match(regex, variable à tester, tableau des matchs trouvés)
//Tester les regex via des tests unitaires sur tout un tas de données différentes
preg_match('/^(09|1[0-7]):(00|30)/', $time, $matches);
if (!empty($matches)) {
    $clean['hour'] = $matches[0]; //ex: 10:30
}

//Alternative : énumération explicite des valeurs admises (si possible)
//Avantages : simple, facile à comprendre et à modifier, cas spéciaux métiers simple à intégrer (ajouter/retirer valeurs)
// $allowed_hours = [
//     '09:30',
//     '10:00',
//     '10:30',
//     '11:00',
//     '11:30',
//     '12:00',
//     '12:30',
//     '13:00',
//     '13:30',
//     '14:00',
//     '14:30',
//     '15:00',
//     '15:30',
//     '16:00',
//     '16:30',
//     '17:00',
//     '17:30',
// ];
// if(in_array($_POST['time'], $allowed_hours)){
// }

//. Validation de la date (constructeur d'un objet)
//Si la chaine fournie au constructeur de l'objet DateTime n'est pas au format attendue
//, une exception sera levée.
try {
    $date = new DateTime($_POST['date'] . ' ' . $clean['hour']);
    //Vérifier que la date > aujourd'hui
    //Vérifier que c'est un jour d'ouverture du cabinet (lundi au vendredi)
    //Si je passe tous les tests, alors je l'ajoute a $clean
    $clean['date'] = $date;
} catch (DateMalformedStringException $exception) {
    //Faire qqchose au besoin
}

//Etc...

//Sanitization et échappement


//Champs présents est aussi une validation !
$requiredData = ['firstname', 'lastname', 'sms_reminder', 'nb_acc'];
$cleanData = array_keys($clean);
//...
//Si toutes les clefs requises $requiredData sont présentes dans $cleanData, alors le rendez-vous peut être pris (déployer la logique métier en utilisant $clean)

$message = sprintf(
    "%s %s, votre rendez-vous a bien été confirmé pour le %s à %.",
    $clean['firstname'],
    $clean['lastname'],
    ($clean['date'])->format('d/m/Y'),
    $clean['hour']
);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendez-vous validé</title>
</head>

<body>
    <h1>Rendez-vous validé</h1>
    <p>
        <?php echo $message;?>
    </p>
</body>

</html>