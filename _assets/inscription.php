<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="NoS1gnal">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="_assets/styles/inscription.css">
    <script src="_assets/scripts/afficherMdp.js"></script>
    <script src="_assets/scripts/Inscription.js"></script>
    <title>Inscription</title>
</head>
<body>
<div class="login-form">
    <?php
    if (isset($_GET['reg_err'])) {
        $err = htmlspecialchars($_GET['reg_err']);

        switch ($err) {
            case 'success':
                echo '<div class="alert alert-success">
                        <strong>Succès</strong> Inscription réussie !
                      </div>';
                break;

            case 'password':
                echo '<div class="alert alert-danger">
                        <strong>Erreur</strong> Mot de passe différent
                      </div>';
                break;

            case 'email':
                echo '<div class="alert alert-danger">
                        <strong>Erreur</strong> Email non valide
                      </div>';
                break;

            case 'email_length':
                echo '<div class="alert alert-danger">
                        <strong>Erreur</strong> Email trop long
                      </div>';
                break;

            case 'pseudo_length':
                echo '<div class="alert alert-danger">
                        <strong>Erreur</strong> Pseudo trop long
                      </div>';
                break;

            case 'already':
                echo '<div class="alert alert-danger">
                        <strong>Erreur</strong> Compte déjà existant
                      </div>';
                break;
        }
    }
    ?>

    <form action="inscription.php" method="post">
        <h2 class="text-center">Inscription</h2>
        <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" required="required" autocomplete="on">
        </div>
        <div class="form-group">
            <label for="email">Adresse mail</label>
            <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="age">Âge</label>
            <input type="number" name="age" class="form-control" placeholder="Âge" required="required">
        </div>
        <div class="form-group">
            <label for="genre">Genre</label>
            <select name="genre" class="form-control">
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
            </select>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="checkbox" id="showPassword"> Afficher le mot de passe
        </div>
        <div class="form-group">
            <input type="password" name="password_retype" id="password_retype" class="form-control" placeholder="Re-tapez le mot de passe" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="checkbox" id="showPasswordRetype"> Afficher le mot de passe
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Inscription</button>
        </div>
    </form>
    <p class="text-center">Déjà inscrit ? <a href="connexion.php">Connectez-vous ici</a></p>
</div>
<script>
    // Fonction pour afficher ou masquer le mot de passe
    function togglePasswordVisibility(inputId, checkboxId) {
        const passwordInput = document.getElementById(inputId);
        const checkbox = document.getElementById(checkboxId);

        if (checkbox.checked) {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }

    // Ajouter des écouteurs d'événements aux cases à cocher
    document.getElementById("showPassword").addEventListener("change", function () {
        togglePasswordVisibility("password", "showPassword");
    });

    document.getElementById("showPasswordRetype").addEventListener("change", function () {
        togglePasswordVisibility("password_retype", "showPasswordRetype");
    });
</script>
</body>
</html>
