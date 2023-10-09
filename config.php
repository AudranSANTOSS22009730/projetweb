<?php
$servername = "mysql-wap.alwaysdata.net";
$username = "wap";
$password = "wapiutaix";
$dbname = "wap_bd"; //

// Créez une connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifiez la connexion
if (!$conn) {
    echo "Connection failed!";
}
?>