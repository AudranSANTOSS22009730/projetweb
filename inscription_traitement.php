<?php
require_once 'config.php'; // On inclut la connexion à la base de données

// Si les variables existent et ne sont pas vides
if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype'])) {
    // Patch XSS
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password_retype = htmlspecialchars($_POST['password_retype']);

    // On vérifie si l'utilisateur existe
    $check = $conn->prepare('SELECT pseudo, password,  email FROM users WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->num_rows;

    $email = strtolower($email); // On transforme toutes les lettres majuscules en minuscules pour éviter les doublons d'adresses email

    // Si la requête renvoie un résultat nul, l'utilisateur n'existe pas
    if ($row == 0) {
        if (strlen($pseudo) <= 100) { // On vérifie que la longueur du pseudo <= 100
            if (strlen($email) <= 100) { // On vérifie que la longueur de l'email <= 100
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // Si l'email est au bon format
                    if ($password === $password_retype) { // Si les deux mots de passe saisis sont identiques

                        // On hash le mot de passe avec Bcrypt, en utilisant un coût de 12
                        $cost = ['cost' => 12];
                        $password = password_hash($password, PASSWORD_BCRYPT, $cost);

                        // On stocke l'adresse IP
                        $ip = $_SERVER['REMOTE_ADDR'];

                        // On insère les données dans la base de données
                        $insert = $conn->prepare('INSERT INTO users(pseudo, password, email, ip, token) VALUES (?, ?, ?, ?, ?)');
                        $insert->bind_param('sssss', $pseudo, $password, $email, $ip, $token);

                        // Générer le token
                        $token = bin2hex(openssl_random_pseudo_bytes(64));

                        // Exécuter la requête
                        $insert->execute();


                        // On redirige avec le message de succès
                        header('Location:inscription.php?reg_err=success');
                        die();
                    } else {
                        header('Location: inscription.php?reg_err=password');
                        die();
                    }
                } else {
                    header('Location: inscription.php?reg_err=email');
                    die();
                }
            } else {
                header('Location: inscription.php?reg_err=email_length');
                die();
            }
        } else {
            header('Location: inscription.php?reg_err=pseudo_length');
            die();
        }
    } else {
        header('Location: inscription.php?reg_err=already');
        die();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="NoS1gnal"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Inscription</title>
    <style>
        /* Votre CSS ici */
    </style>
</head>
<body>
<div class="login-form">
    <!-- Le formulaire d'inscription -->
</div>
</body>
</html>

