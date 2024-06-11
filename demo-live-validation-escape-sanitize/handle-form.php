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



/**
 * Données soumises via une requête GET sont fournies dans cette variable
 * super-globale 
 */
// var_dump($_GET);


//Inspecter les valeurs sécurisées
var_dump($clean);
