<?php

/**
 * Script qui traite le formulaire de prise de rendez-vous
 * Gère les données qui entrent dans le système
 */

// var_dump($_POST);


/**
 * Traiter les champs. Bien séparer les données venant de l'exterieur des données validées par le script
 */

$clean = [];

/**
 * Validation : vérifier que le champ est égal à une valeur admise (liste blanche) 
 */

$isSmsReminderClean = isset($_POST['sms-reminder']) && $_POST['sms-reminder'] === 'yes' || $_POST['sms-reminder'] === 'no';

if ($isSmsReminderClean) {
    /**
     * La donnée sms-reminder est présente et validée. On l'ajoute aux données validées
     */
    $clean['sms_reminder'] = $_POST['sms-reminder'];
}

/**
 * Manuellement...
 */
$isNbAccompanyingClean = isset($_POST['nb-acc']) &&
    ctype_digit($_POST['nb-acc']) &&
    in_array(intval($_POST['nb-acc']), [0, 1, 2]);

/**
 * Ou avec filter_input (des fonctions fournies par votre langage, framework, librairies)
 */

$isNbAccompanyingClean = filter_input(INPUT_POST, 'nb-acc', FILTER_VALIDATE_INT, ["options" => ['min_range' => 0, 'max_range' => 2]]);

if ($isNbAccompanyingClean) {
    $clean['nb_acc'] = $_POST['nb-acc'];
}

/**
 * Valider avec une expression régulière (à utiliser avec précaution !)
 * @link https://www.grymoire.com/Unix/Regular.html pour apprendre les regex
 * @link https://regexr.com/ pour tester son expression régulière
 */

//On récupère la donnée dans $_POST (le filtre par défaut ne fait rien à la donnée ici)
$hour = filter_input(INPUT_POST, 'hour');
//valide le format et les horaires d'ouverture, de 9:00 à 17:30 toutes les demi-heures
preg_match('/^(09|1[0-7]):(00|30)/', $hour, $matches);
var_dump($matches);
if(!empty($matches)){
    $clean['hour'] = $matches[0];
}

//On préférera une validation via une liste, plus expressive et plus sûre

$allowed_hours = [
    '09:00', 
    '09:30',
    '10:00',
    '10:30',
    '11:00',
    '11:30',
    '12:00',
    '12:30',
    '13:00',
    '13:30',
    '14:00',
    '14:30',
    '15:00',
    '15:30',
    '16:00',
    '16:30',
    '17:00',
];

//bcp plus simple à lire et à comprendre que la regex
if(in_array($hour, $allowed_hours)){
    $clean['hour'] = $hour;
}

/**
 * La date : un jour de semaine, plus grand que maintenant
 */

$date = filter_input(INPUT_POST, 'date');
$now = new DateTime();

//l'objet DateTime nous donne de la validation via son constructeur
$dateTime = new DateTime($date . ' ' . $hour);

if($dateTime > $now){
    $clean['date'] = $dateTime;
}else{
    //Retourner vers le formulaire avec une erreur
    header('Location: /?error=wrong_date');
    exit;
}


/**
 * Etc...
 */


/**
 * Sanitization/Filtrage : altérer/modifier les données pour les nettoyer de tout caractère indésirable
 * @link https://www.php.net/manual/fr/filter.filters.sanitize.php, pour accéder aux filtres de nettoyage
 */

/**
 * On remplace les caractères spéciaux et quotes par les entités html (altération des données)
 * Est-ce vraiment nécessaire ? Pas toujours, voir la solution d'échappement
 */
$clean['first_name'] = htmlspecialchars($_POST['first-name'], ENT_QUOTES, 'UTF-8');
/**
 * Toutes les valeurs contenues dans $clean ont été inspectées et peuvent être manipulées
 * dans la suite du programme
 */

var_dump($clean);


/**
 * Traiter le formulaire (l'écrire dans une base de données par exemple pour noter
 * le rendez-vous) et afficher un message de confirmation
 */

$message = sprintf(
    "%s %s, votre rendez-vous a bien été confirmé pour le %s à %s. ",
    $clean['first_name'],
    $clean['last_name'],
    ($clean['date'])->format('d/m/Y'),
    $clean['hour'],
);

if ($clean['sms_reminder'] === 'yes') {
    $message .= " Vous aurez un rappel par SMS 1h avant. En cas d'indisponibilité, merci de prévenir au moins 24h à l'avance, si possible.";
}

//On échappe TOUJOURS la sortie;
echo sprintf('%s%s%s', '<p>', htmlentities($message), '</p>');
