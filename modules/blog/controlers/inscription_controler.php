<?php


session_start();
require_once '../../../config.php';
require_once '../views/inscription_view.php';
require_once '../models/Users.php';

if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype']) && !empty($_POST['age']) && !empty($_POST['genre'])) {
    // Validation des données
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['email']);
    $age = htmlspecialchars($_POST['age']);
    $genre = htmlspecialchars($_POST['genre']);
    $password = htmlspecialchars($_POST['password']);
    $password_retype = htmlspecialchars($_POST['password_retype']);

    // Vérification de l'existence de l'utilisateur
    $userModel = new User($conn);
    if (!$userModel->isUserExists($email)) {
        // Vérification du formulaire
        if (strlen($pseudo) <= 100 && strlen($email) <= 100 && filter_var($email, FILTER_VALIDATE_EMAIL) && $password === $password_retype) {
            // Hachage du mot de passe (vous pouvez ajouter le hachage ici si nécessaire)
            //$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Adresse IP de l'utilisateur
            $ip = $_SERVER['REMOTE_ADDR'];

            // Génération d'un jeton
            $token = bin2hex(openssl_random_pseudo_bytes(64));

            // Ajout de l'utilisateur
            $userAdded = $userModel->AjoutUtilisateur($pseudo, $email, $age, $genre, $password, $ip, $token);

            if ($userAdded) {
                header('Location: inscription.php?reg_err=success');
                exit();
            } else {
                header('Location: inscription.php?reg_err=database');
                exit();
            }
        } else {
            header('Location: inscription.php?reg_err=invalid');
            exit();
        }
    } else {
        header('Location: inscription.php?reg_err=already');
        exit();
    }
} else {
    header('Location: inscription.php');
    exit();
}

