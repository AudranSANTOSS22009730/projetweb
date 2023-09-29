<!-- controller.php -->

<?php
session_start();
require_once 'config.php';
require_once 'model.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userModel = new UserModel($conn);
    $user = $userModel->getUserByEmailAndPassword($email, $password);

    if ($user) {
        // L'authentification réussit, vous pouvez stocker des informations dans la session si nécessaire
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];

        // Redirigez l'utilisateur vers la page d'accueil
        header("Location: acc.php");
        exit();
    } else {
        // L'authentification a échoué, redirigez vers la page d'erreur
        header("Location: index.php?error=Incorrect User name or password");
        exit();
    }
} else {
    // Les champs email et mot de passe sont vides, redirigez vers la page de connexion
    header("Location: index.php");
    exit();
}
?>
