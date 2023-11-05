
<?php
include('../../blog/models/users_model.php');
$publicationModel = new PublicationModel();
$Publications = $publicationModel->getPublications();
$cheminConfig = '/home/wap/www/config.php';


session_start();
require_once 'config.php';
require_once '../models/users_model.php';


if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype']) && !empty($_POST['age']) && !empty($_POST['genre'])) {
// Valide et sécurise les données
$pseudo = htmlspecialchars($_POST['pseudo']);
$email = htmlspecialchars($_POST['email']);
$age = htmlspecialchars($_POST['age']);
$genre = htmlspecialchars($_POST['genre']);
$password = htmlspecialchars($_POST['password']);
$password_retype = htmlspecialchars($_POST['password_retype']);

if ($user) {
// L'authentification réussit, vous pouvez stocker des informations dans la session si nécessaire
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_email'] = $user['email'];

// Redirigez l'utilisateur vers index.php
header("Location: index.php");
exit();
} else {
// L'authentification a échoué, redirigez vers la page d'erreur
header("Location: index.php?error=Incorrect User name or password");
exit();
}
// Vérification de l'existence de l'utilisateur
$userModel = new UserModel($conn);
if ($userModel->isUserExists($email)) {
redirectWithError('already');
}
if (strlen($pseudo) > 100) {
redirectWithError('pseudo_length');
}

if (strlen($email) > 100 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
redirectWithError('email');
}

if ($password !== $password_retype) {
redirectWithError('password');
}
$ip = $_SERVER['REMOTE_ADDR'];
$token = bin2hex(openssl_random_pseudo_bytes(64));

if ($userModel->addUser($pseudo, $email, $age, $genre, $password, $ip, $token)) {
header('Location: inscription.php?reg_err=success');
exit();
} else {
redirectWithError('database');
}
} else {
header('Location: inscription.php');
exit();
}
if (!$userModel->isUserExists($email)) {

// L'authentification réussit, vous pouvez stocker des informations dans la session si nécessaire
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_email'] = $user['email'];


// Vérification du formulaire
if (strlen($pseudo) <= 100 && strlen($email) <= 100 && filter_var($email, FILTER_VALIDATE_EMAIL) && $password === $password_retype) {
// Hachage du mot de passe (vous pouvez ajouter le hachage ici si nécessaire)
//$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

// Adresse IP de l'utilisateur
$ip = $_SERVER['REMOTE_ADDR'];

// Génération d'un jeton
$token = bin2hex(openssl_random_pseudo_bytes(64));

// Ajout de l'utilisateur
$userAdded = $userModel->addUser($pseudo, $email, $age, $genre, $password, $ip, $token);

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
}