<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Login and Register</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="signup">
    <form>
        <h1>Sign up</h1>
        <h4>Join Woap !</h4>
        <p>Nom</p>
        <input type="text" name="Nom">
        <p>Prenom</p>
        <input type="text" name="Prenom">
        <p>Email</p>
        <input type="email" name="email">
        <p>Mot de passe</p>
        <input type="password" name="password" id="password">
        <div id="password-strength-messages"></div> <!-- Div pour les messages d'alerte -->
        <p>Répétez votre mot de passe</p>
        <input type="password" name="repeatpassword"><br><br>
        <input type="submit" name="submit" value="Sign in">
    </form>
    <p>En cliquant sur le bouton, vous acceptez les conditions générales<br>
        <a href="#">Termes & Condition</a> and <a href="#">Politique privée</a>
    </p>
    <p>Vous avez déjà un compte ? <a href="login.php">Login</a></p>
</div>

<script>
$(document).ready(function() {
    const passwordInput = $("#password");
    const passwordStrengthMessages = $("#password-strength-messages");

    function updatePasswordStrength() {
        const password = passwordInput.val();
        let strengthClass = "very-weak";

        if (password.length >= 8) {
            strengthClass = "weak";
        }
        if (/[0-9]/.test(password)) {
            strengthClass = "medium";
        }
        if (/[@$]/.test(password)) {
            strengthClass = "strong";
        }

        // Afficher les messages d'alerte en fonction de la classe de fiabilité
        if (strengthClass === "very-weak") {
            passwordStrengthMessages.html("<p style='color: red;'>Le mot de passe est très faible.</p>");
        } else if (strengthClass === "weak") {
            passwordStrengthMessages.html("<p style='color: orange;'>Le mot de passe est faible.</p>");
        } else if (strengthClass === "medium") {
            passwordStrengthMessages.html("<p style='color: yellow;'>Le mot de passe est moyen.</p>");
        } else {
            passwordStrengthMessages.html("<p style='color: green;'>Le mot de passe est fort.</p>");
        }
    }

    passwordInput.on("input", updatePasswordStrength);
});
</script>
</body>
</html>
