<?php
    // Démarre la session
    session_start();

    // Fonction pour vérifier si l'utilisateur est connecté
    function estConnecte() {
        return isset($_SESSION['utilisateur']);
    }

    // Fonction pour vérifier l'authentification de l'utilisateur
    function authentifier($nomUtilisateur, $motDePasse) {
        // Remplacez cette vérification factice par une vérification réelle avec une base de données
        $utilisateurValide = ($nomUtilisateur === 'utilisateur' && $motDePasse === 'motdepasse');

        if ($utilisateurValide) {
            // Stocke le nom d'utilisateur dans la session
            $_SESSION['utilisateur'] = $nomUtilisateur;
            return true;
        } else {
            return false;
        }
    }

    // Fonction pour déconnecter l'utilisateur
    function deconnecter() {
        // Détruit toutes les variables de session
        session_unset();

        // Détruit la session
        session_destroy();
    }

    // Utilisation des fonctions
    if (estConnecte()) {
        echo "Bienvenue, ".$_SESSION['utilisateur']." ! <a href='deconnexion.php'>Se déconnecter</a>";
    } else {
        // Vérifie si le formulaire a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nomUtilisateur = $_POST['nom_utilisateur'];
            $motDePasse = $_POST['mot_de_passe'];

            // Vérifie l'authentification de l'utilisateur
            if (authentifier($nomUtilisateur, $motDePasse)) {
                echo "Bienvenue, ".$nomUtilisateur." ! <a href='deconnexion.php'>Se déconnecter</a>";
            } else {
                echo "Nom d'utilisateur ou mot de passe incorrect.";
            }
        } else {
            // Affiche le formulaire de connexion
            echo "
                <form method='post' action=''>
                    <label for='nom_utilisateur'>Nom d'utilisateur:</label>
                    <input type='text' name='nom_utilisateur' required><br>
                    
                    <label for='mot_de_passe'>Mot de passe:</label>
                    <input type='password' name='mot_de_passe' required><br>
                    
                    <input type='submit' value='Se connecter'>
                </form>
            ";
        }
    }