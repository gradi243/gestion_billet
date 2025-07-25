<?php
// connexion.php

// Paramètres de connexion à la base de données
$host = 'localhost'; // Généralement 'localhost' si la base de données est sur le même serveur
$db   = 'nom_de_votre_base_de_donnees'; // <<< REMPLACER PAR LE NOM DE VOTRE BASE DE DONNÉES
$user = 'votre_utilisateur'; // <<< REMPLACER PAR VOTRE NOM D'UTILISATEUR DE BASE DE DONNÉES
$pass = 'votre_mot_de_passe'; // <<< REMPLACER PAR VOTRE MOT DE PASSE DE BASE DE DONNÉES
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Active les exceptions pour les erreurs
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Définit le mode de récupération par défaut à associatif
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Désactive l'émulation des requêtes préparées pour une meilleure sécurité
];

try {
    $con = new PDO($dsn, $user, $pass, $options);
    // echo "Connexion à la base de données réussie !"; // Pour débogage, à commenter en production
} catch (\PDOException $e) {
    // En cas d'erreur de connexion, enregistre l'erreur et affiche un message générique
    error_log("Erreur de connexion à la base de données: " . $e->getMessage());
    die("Impossible de se connecter à la base de données pour le moment. Veuillez réessayer plus tard.");
}
?>