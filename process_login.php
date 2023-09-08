<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $db_email = 'utilisateur@example.com';
    $db_password_hash = '$2y$10$SxELsYs0q2Hv18bvY3c1FOex..';
    if ($email === $db_email && password_verify($password, $db_password_hash)) {
        echo "Authentification réussie. Redirection vers le profil...";
    } else {
        echo "L'authentification a échoué. Veuillez vérifier vos informations de connexion.";
    }
}
?>
