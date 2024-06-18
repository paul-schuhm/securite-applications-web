<?php

session_start();

$isActiveSessionOfKnownUser = session_status() === PHP_SESSION_ACTIVE && isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true;
$deleteMyDataIsRequested = isset($_POST['delete-my-data']);
//Sécurisation du formulaire
//Vérification de la présence du token et validation de sa valeur !
$isCSRFTokenVerified = isset($_POST['csrf_token']) && $_POST['csrf_token'] == $_SESSION['csrf_token'];

if ($isActiveSessionOfKnownUser && $deleteMyDataIsRequested && $isCSRFTokenVerified) {
    //Supprimer toutes les données du compte...
    echo "<p>{$_SESSION['name']}, comme vous l'avez demandé, toutes vos données ont bien été supprimées.</p>";
    //Supprimer le csrf_token. Le token a été consommé. Un autre sera généré pour la prochaine requête à traiter.
    unset($_SESSION['csrf_token']);
} else {
    echo "<p>Impossible de vous authentifier (aucune session en cours). La ressource que vous cherchez est introuvable.</p>";
    echo "<a href='/'>Retourner à la page d'accueil</p>";
}
