<?php
    // Paramètres de la base de données
    $serveur = 'db'; // Adresse du serveur MySQL
    $port = '3306'; // Port de connexion
    $utilisateur = 'user'; // Nom d'utilisateur MySQL
    $motDePasse = 'password'; // Mot de passe MySQL
    $nomBaseDeDonnees = 'web_app'; // Nom de la base de données

    try {
        // Crée une connexion à la base de données avec le port spécifié
        $connexion = new PDO("mysql:host=$serveur;port=$port;dbname=$nomBaseDeDonnees", $utilisateur, $motDePasse);
    
        // Configure le mode d'erreur de PDO sur Exception
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        echo "Connexion à la base de données réussie";
    } catch (PDOException $e) {
        // En cas d'erreur de connexion, affiche l'erreur
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
