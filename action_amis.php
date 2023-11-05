<?php
// Démarre la session
session_start();

// Inclue le fichier de configuration pour la base de données
require "config.php";

// Vérifie si l'action est "delete" (suppression d'un ami)
if ($_GET['action'] == "delete") {
    // Supprime l'ami avec l'identifiant spécifié de la table "friends"
    $conn->query("DELETE FROM friends WHERE id =".$_GET['id']);
    header('Location: amis.php');

}
// Si l'action est "add" (ajout d'un ami)
if($_GET['action'] == "add"){
    // Prépare et exécute une requête pour insérer une nouvelle entrée dans la table "friends"
    $query = $conn->prepare("INSERT INTO friends(pseudo_1, pseudo_2, is_pending) VALUES (:pseudo_1, :pseudo_2, :is_pending)");

    $query->execute([

        "pseudo_1" => $_SESSION['pseudo'],
        "pseudo_2" => $_GET['pseudo'],
        "is_pending" => 1
    ]);
    // Redirige vers la page des amis après l'ajout
    header('Location: amis.php');
}
// Si l'action est "accept" (acceptation d'une demande d'ami en attente)
if($_GET['action'] == "accept"){
    // Mets à jour le statut "is_pending" de l'ami avec l'identifiant spécifié
    $conn->query("UPDATE friends SET is_pending = 0 WHERE id =".$_GET['id']);
    // Redirige vers la page des amis après l'acceptation
    header('Location: amis.php');

}

?>