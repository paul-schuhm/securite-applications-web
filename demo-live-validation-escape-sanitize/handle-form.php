<?php

/**
 * Traitement du formulaire
 */

/**
 * Données soumises via une requête POST sont fournies dans cette variable
 * super-globale 
 */
// var_dump($_POST);

/**
 * Penser à bien séparer les données qui sont potentiellement dangereuses pour votre système
 * (celles qui viennent de l'exterieur) des données saines
 */

// Un tableau de valeurs saines (validées)
$clean = [];


/**
 * Validation : motif
 */

//Valeurs autorisées
$reasons = ['consultation', 'urgency', 'other', 'follow-up'];

$isReasonValid = isset($_POST['reason']) && in_array($_POST['reason'], $reasons);

if ($isReasonValid) {
  //Ajoute au "panier" des valeurs clean/safe
  $clean['reason'] = $_POST['reason'];
} else {
  //Renvoie à la page du formulaire, sans le traiter
  //Redirection vers la page d'accueil (/) avec une erreur en paramètre d'URL
  header('Location: /?error=wrong_data');
  exit;
}



//Valider le nombre d'accompagnants

$isNbComp = filter_input(
  INPUT_POST,
  'nb-comp',
  FILTER_VALIDATE_INT,
  [
    'options' => [
      'min_range' => 0, 'max_range' => 2
    ]
  ]
);

if ($isNbComp) {
  $clean['nb-comp'] = $_POST['nb-comp'];
}

/**
 * Valider l'heure
 */

$time = $_POST['time'];

preg_match('/^(09|1[0-7]):(00|30)/', $time, $matches);

if (!empty($matches)) {
  $clean['time'] = $matches[0];
}

//Autre méthode

$allowedHours = [
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
  '17:30',
];

if (in_array($time, $allowedHours)) {
  $clean['time'] = $time;
}

//Prénom (Nom)

$clean['first-name'] = $_POST['first-name'];


//....


//Fini de valider tous les champs. Le tableau $clean est rempli de données sécurisées

//Traitement métier, rendre service en utilisant les données du client

$firstName = $clean['first-name'];

/**
 * Dans le contexte de l'écriture du HTML, j'échappe les caractères dangereux (ici via la fonction htmlentities)
 * qui transforme les caractères spéciaux du html (<, >, etc.) en entités HTML. Les entités HTML sont fréquemment 
 * utilisées pour afficher des caractères réservés qui seraient autrement interprétés comme du code HTML ! 
 * @link https://developer.mozilla.org/fr/docs/Glossary/Entity
 */

echo htmlentities($firstName) . ", votre rendez-vous a bien été confirmé";


/**
 * Données soumises via une requête GET sont fournies dans cette variable
 * super-globale 
 */
// var_dump($_GET);
//Inspecter les valeurs sécurisées
// var_dump($clean);
