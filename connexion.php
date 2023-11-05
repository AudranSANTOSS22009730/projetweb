<?php
// Démarre la session
session_start();

// Inclue le fichier de configuration pour la base de données
include "config.php";

// Vérifie si le formulaire de connexion a été soumis
if (isset($_POST['formconnexion'])) {
    $email = htmlspecialchars($_POST['email']); // Récupére l'e-mail saisi et le sécuriser
    $password = htmlspecialchars($_POST['password']); // Récupére le mot de passe saisi et le sécurise

    // Vérifie si les champs e-mail et mot de passe ne sont pas vides
    if (!empty($email) AND !empty($password)) {
        // Prépare et exécute une requête pour vérifier si l'utilisateur existe dans la base de données
        $requser = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $requser->execute(array($email, $password));

        // Compte le nombre de lignes correspondantes
        $userexist = $requser->rowCount();
        // Si l'utilisateur existe
        if ($userexist == 1) {
            $userinfo = $requser->fetch(); // Récupére les informations de l'utilisateur
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['pseudo'] = $userinfo['pseudo'];
            $_SESSION['email'] = $userinfo['email'];
            header("Location: profil.php?id=" . $_SESSION['id']); // Redirige vers la page de profil
        } else {
            $erreur = "Mauvais mail ou mot de passe !";  // Affiche un message d'erreur
        }
    } else {
        $erreur = "Tous les champs doivent être complétés !"; // Affiche un message d'erreur
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="_assets/styles/connexion.css">
    <script src="_assets/scripts/afficher.js"></script>

</head>
<body>
<div class="login-container">
    <div class="login-form">
        <h2>Connexion</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="email">Mail</label>
                <input type="email" name="email" id="email" placeholder="Votre e-mail" />
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="Mot de passe" />
                <input type="checkbox" id="showPassword"> Afficher le mot de passe
            </div>
            <input type="submit" name="formconnexion" value="Connexion" class="btn" />
            <p class="text-center">Pas encore inscrit ? <a href="inscription.php">Inscrivez vous ici</a></p>

        </form>
        <?php
        if (isset($erreur)) {
            echo '<font color="red">' . $erreur . "</font>"; // Affiche un message d'erreur si nécessaire
        }
        ?>
    </div>
</div>
<script>
    // Fonction pour afficher ou masquer le mot de passe
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById("password");
        const checkbox = document.getElementById("showPassword");

        if (checkbox.checked) {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        // Ajoute un écouteur d'événement pour la case à cocher "Afficher le mot de passe"
        const showPasswordCheckbox = document.getElementById("showPassword");
        showPasswordCheckbox.addEventListener("change", togglePasswordVisibility);
    });

</script>
</body>
</html>
