<?php
// Informations de connexion à la base de données
$servername = "mysql-wap.alwaysdata.net";
$username = "wap";
$password = "wapiutaix";
$dbname = "wap_bd"; //

try {
    // Création d'une connexion PDO à la base de données
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);

    // Configuration de PDO pour afficher les erreurs sous forme d'exceptions
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // En cas d'erreur de connexion, affichage d'un message d'erreur
    echo "La connexion a échoué : " . $e->getMessage();

}
/*
// Créez une connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifiez la connexion
if (!$conn) {
    echo "Connection failed!";
}
*/

?>