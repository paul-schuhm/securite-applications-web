<?php

/**
 * Script en charge de l'authentification des utilisateurs
 */

/**
 * Simule les utilisateurs du système (login => password)
 */
$users = [
    'jdoe' => 'password'
];

/**
 * On log l'activité d'authentification
 */
$logFile = fopen("login_attempts.log", "a");

// L'adresse IP de l'utilisateur
$ip = $_SERVER['REMOTE_ADDR'];

// La date et l'heure
$timestamp = date("Y-m-d H:i:s");

$clean = [];

$login = filter_input(INPUT_POST, 'login');
$password = filter_input(INPUT_POST, 'password');

//Authentification réussie (par validation des données fournies)
if (isset($users[$login]) && $users[$login] === $password) {

    fwrite($logFile, "SUCCESS - $login - $ip - $timestamp" . PHP_EOL);

    http_response_code(200);
    //On échappe toujours des données qui proviennent de l'extérieur
    echo htmlentities("Bienvenue $login");
} else {
    /** Authentification échouée, on redirige vers la home avec un message d'erreur (via param d'url)
     *  Code 401 : unauthorized
     *  @link https://developer.mozilla.org/en-US/docs/Web/HTTP/Status
     */
    fwrite($logFile, "FAILURE - $login - $ip - $timestamp" . PHP_EOL);
    http_response_code(401);
    header('Location: /?error=auth_failed');
}
