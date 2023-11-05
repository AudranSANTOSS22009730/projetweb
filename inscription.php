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
                ?><?php
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
            <span id="password-error" class="error-message" style="display:none;">Le mot de passe est trop faible.</span>
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
    document.addEventListener("DOMContentLoaded", function() {
        const formulaire = document.getElementById("formulaire-inscription");
        const erreurUtilisateur = document.getElementById("erreur-utilisateur");

        formulaire.addEventListener("submit", function(event) {
            event.preventDefault(); // Empêche l'envoi du formulaire par défaut

            const pseudo = document.querySelector('input[name="pseudo"]').value; // Récupère la valeur du champ pseudo

            // Effectuer une requête AJAX pour vérifier si le nom d'utilisateur est déjà utilisé
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "verification_utilisateur.php", true); // Assurez-vous de créer "verification_utilisateur.php" pour gérer la vérification
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    if (xhr.responseText === "utilisateur_existe") {
                        // Nom d'utilisateur déjà utilisé, afficher le message d'erreur
                        erreurUtilisateur.style.display = "block";
                    } else {
                        // Le nom d'utilisateur est unique, continuez avec l'inscription
                        formulaire.submit(); // Soumettez le formulaire
                    }
                }
            };
            xhr.send("pseudo=" + encodeURIComponent(pseudo));
        });
    });

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

    document.addEventListener("DOMContentLoaded", function() {
        const passwordInput = document.getElementById("password");
        const passwordError = document.getElementById("password-error");

        passwordInput.addEventListener("input", function() {
            const password = passwordInput.value;
            const passwordPattern = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{10,}$/;

            if (passwordPattern.test(password)) {
                passwordError.style.display = "none";
            } else {
                passwordError.style.display = "block";
            }
        });
    });



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
<script src="_assets/scripts/suggestion_mail.js"></script>
</body>
</html>
