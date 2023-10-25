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

/*
try {
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion établie avec succès";
} catch(PDOException $e) {
    echo "La connexion a échoué : " . $e->getMessage();

}*/
?>