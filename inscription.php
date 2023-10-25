<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="NoS1gnal"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="_assets/styles/inscription.css">
    <link rel="icon" href="modules/_assets/images/icons/wapp_icon.png" type="image/png">
    <script src="_assets/scripts/afficher.js"></script>

    <title>Inscription</title>
</head>
<body>
<div class="login-form">
    <?php
    if(isset($_GET['reg_err'])) {
        $err = htmlspecialchars($_GET['reg_err']);

        switch($err) {
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
            <label for="pseudo">pseudo</label>
            <input type="text" name="pseudo" class="form-control" placeholder="pseudo" required="required" autocomplete="on">
        </div>
        <div class="form-group">
            <label for="email"> Adresse mail</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
            <!-- Suggestions pour l'e-mail -->
            <div id="email-suggestions" style="display: none;">
                <div class="email-suggestion">Gmail</div>
                <div class="email-suggestion">GMX</div>
                <div class="email-suggestion">ProtonMail</div>
                <div class="email-suggestion">Yahoo Mail</div>
                <div class="email-suggestion">Outlook.com</div>
                <div class="email-suggestion">mail.fr</div>
            </div>
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

    function checkPasswordStrength() {
        const passwordInput = document.getElementById("password");
        const passwordStrength = document.getElementById("password-strength");
        const password = passwordInput.value;

        const passwordPattern = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{10,}$/;

        if (passwordPattern.test(password)) {
            passwordStrength.innerHTML = "Fort";
            passwordStrength.style.color = "green";
            return true; // Le formulaire est soumis
        } else {
            alert("Le mot de passe est faible. Il doit contenir au moins 10 caractères, dont des majuscules, des minuscules, des chiffres et des caractères spéciaux.");
            passwordStrength.innerHTML = "Faible (min. 10 caractères, majuscules, minuscules, chiffres, caractères spéciaux)";
            passwordStrength.style.color = "red";
            return false; // Le formulaire n'est pas soumis
        }
    }


    // Ajouter des écouteurs d'événements aux cases à cocher
    document.getElementById("showPassword").addEventListener("change", function () {
        togglePasswordVisibility("password", "showPassword");
    });

    document.getElementById("showPasswordRetype").addEventListener("change", function () {
        togglePasswordVisibility("password_retype", "showPasswordRetype");
    });

    // Suggestions pour l'e-mail
    const emailInput = document.getElementById("email");
    const emailSuggestions = document.getElementById("email-suggestions");
    const emailSuggestionItems = emailSuggestions.getElementsByClassName("email-suggestion");

    // Fonction pour afficher les suggestions
    function showSuggestions() {
        emailSuggestions.style.display = "block";
    }

    // Fonction pour masquer les suggestions
    function hideSuggestions() {
        emailSuggestions.style.display = "none";
    }

    // Ajouter un écouteur d'événement pour la saisie dans le champ d'e-mail
    emailInput.addEventListener("input", function () {
        const inputText = emailInput.value.toLowerCase();
        showSuggestions(); // Toujours afficher les suggestions lors de la saisie
        for (let suggestion of emailSuggestionItems) {
            const suggestionText = suggestion.textContent.toLowerCase();
            if (suggestionText.includes(inputText)) {
                suggestion.style.display = "block";
            } else {
                suggestion.style.display = "none";
            }
        }
    });

    // Ajouter des écouteurs d'événements pour gérer les interactions avec les suggestions
    emailInput.addEventListener("focus", showSuggestions);
    emailInput.addEventListener("blur", hideSuggestions);

    for (let suggestion of emailSuggestionItems) {
        suggestion.addEventListener("click", function () {
            emailInput.value = suggestion.textContent;
            hideSuggestions();
        });
    }
</script>
</body>
</html>
