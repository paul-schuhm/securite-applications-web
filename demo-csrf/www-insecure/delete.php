<?php

/**
 * Une ressource web protégée par authentification
 * qui permet de supprimer toutes ses données sur
 * l'application
 */

/**
 * On démarre la session, i.e on récupère les informations
 * associées à l'identifiant de session PHPSESSID fourni 
 * le cookie envoyé (automatiquement) avec la requête GET pour arriver sur cette page.
 * 
 * On doit donc retrouver la donnée user=jdoe déposée sur la page précédente 
 * (générée ici par index.php)
 */
session_start();

/**
 * Si une session est active (i. e si un cookie de session correct est envoyé), on supprime les données.
 * Sinon on rejette avec un message d'erreur
 */

$isActiveSessionOfKnownUser = session_status() === PHP_SESSION_ACTIVE && isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true;

//Si l'utilisateur est correctement authentifié et qu'il a soumis le formulaire via POST, on traite sa demande
if ($isActiveSessionOfKnownUser && isset($_POST['delete-my-data'])) {
    //Supprimer toutes les données du compte...
    echo "<p>{$_SESSION['name']}, comme vous l'avez demandé, toutes vos données ont bien été supprimées.</p>";
} else {
    echo "<p>Impossible de vous authentifier (aucune session en cours). La ressource que vous cherchez est introuvable.</p>";
    echo "<a href='/'>Retourner à la page d'accueil</p>";
}
