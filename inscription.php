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
        body {
            background-color: #000000;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-form {
            background-color: #ffd929;
            color: black;
            width: 340px;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 100);
        }
        .login-form h2 {
            margin: 0 0 15px;
        }
        .form-control, .btn {
            min-height: 38px;
            border-radius: 2px;
        }
        .btn {
            font-size: 15px;
            font-weight: bold;
            background-color: black;
            color: white;
        }
    </style>
</head>
<body>
<div class="login-form">
    <?php
    if(isset($_GET['reg_err']))
    {
        $err = htmlspecialchars($_GET['reg_err']);

        switch($err)
        {
            case 'success':
                ?>
                <div class="alert alert-success">
                    <strong>Succès</strong> inscription réussie !
                </div>
                <?php
                break;

            case 'password':
                ?>
                <div class="alert alert-danger">
                    <strong>Erreur</strong> mot de passe différent
                </div>
                <?php
                break;

            case 'email':
                ?>
                <div class="alert alert-danger">
                    <strong>Erreur</strong> email non valide
                </div>
                <?php
                break;

            case 'email_length':
                ?>
                <div class="alert alert-danger">
                    <strong>Erreur</strong> email trop long
                </div>
                <?php
                break;

            case 'pseudo_length':
                ?>
                <div class="alert alert-danger">
                    <strong>Erreur</strong> pseudo trop long
                </div>
                <?php
                break;

            case 'already':
                ?>
                <div class="alert alert-danger">
                    <strong>Erreur</strong> compte déjà existant
                </div>
                <?php
                break;
        }
    }
    ?>

    <form action="inscription_traitement.php" method="post">
        <h2 class="text-center">Inscription</h2>
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" class="form-control" placeholder="Nom" required="required" autocomplete="on">
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" class="form-control" placeholder="Prénom" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="email"> Adresse mail</label>
            <input type="text" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
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

        <p class="text-center">Déjà inscrit ? <a href="index.php">Connectez-vous ici</a></p>
    </form>
</div>

<!-- JavaScript pour afficher/masquer le mot de passe -->
<script>
    const passwordField = document.getElementById('password');
    const showPasswordCheckbox = document.getElementById('showPassword');
    const passwordRetypeField = document.getElementById('password_retype');
    const showPasswordRetypeCheckbox = document.getElementById('showPasswordRetype');

    showPasswordCheckbox.addEventListener('change', function () {
        passwordField.type = this.checked ? 'text' : 'password';
    });

    showPasswordRetypeCheckbox.addEventListener('change', function () {
        passwordRetypeField.type = this.checked ? 'text' : 'password';
    });
</script>
</body>
</html>

