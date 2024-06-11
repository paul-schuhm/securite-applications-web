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

if($isReasonValid){
  //Ajoute au "panier" des valeurs clean/safe
  $clean['reason'] = $_POST['reason'];
}else{
  //Renvoie à la page du formulaire, sans le traiter
  //Redirection vers la page d'accueil (/) avec une erreur en paramètre d'URL
  header('Location: /?error=wrong_data');
  exit;
}

//Inspecter les valeurs sécurisées
var_dump($clean);

/**
 * Données soumises via une requête GET sont fournies dans cette variable
 * super-globale 
 */
// var_dump($_GET);
