<?php
// Fonction pour se connecter à la base de données
function getConnection() {
    // Paramètres de connexion
    $host = 'localhost'; // Hôte de la base de données
    $dbname = 'user_management'; // Nom de la base de données
    $username = 'jules'; // Nom d'utilisateur de la base de données
    $password = 'jules'; // Mot de passe de la base de données

    try {
        // Crée une nouvelle connexion PDO
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        // Définit l'option pour gérer les erreurs
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        // Affiche un message d'erreur en cas d'échec de la connexion
        echo "Erreur de connexion : " . $e->getMessage();
        return null;
    }
}
?>
