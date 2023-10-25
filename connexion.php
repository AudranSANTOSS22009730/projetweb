<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Votre contenu du head existant -->
</head>
<body>
<div class="login-form">
    <?php
    if(isset($_GET['login_err'])) {
        $err = htmlspecialchars($_GET['login_err']);

        switch($err) {
            case 'password':
                echo '<div class="alert alert-danger">
                    <strong>Erreur</strong> mot de passe incorrect
                </div>';
                break;

            case 'email':
                echo '<div class="alert alert-danger">
                    <strong>Erreur</strong> email incorrect
                </div>';
                break;
        }
    }
    ?>

    <form action="connex.php" method="post">
        <h2 class="text-center">Connexion</h2>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
        </div>
        <div class="form-group">
            <button id="connexion-button" type="submit" class="btn btn-primary btn-block">Connexion</button>
        </div>
    </form>
    <p class="text-center"><a href="inscription.php">Inscription</a></p>
    <p class="text-center"><a href="mdpOublie.php">Mot de passe oublié</a></p>
</div>

<script>
    var loginAttempts = 0;
    var maxLoginAttempts = 3;
    var lockoutTime = 60; // 60 seconds

    function checkPassword() {
        // Replace this logic with actual password validation
        var isPasswordCorrect = false;

        if (!isPasswordCorrect) {
            loginAttempts++;
            var remainingAttempts = maxLoginAttempts - loginAttempts;

            if (remainingAttempts > 0) {
                window.alert("Mot de passe incorrect. " + remainingAttempts + " tentative(s) restante(s).");
            } else {
                document.getElementById('connexion-button').disabled = true;
                document.getElementById('connexion-button').classList.add("btn-danger");
                setTimeout(function () {
                    resetLoginAttempts();
                }, lockoutTime * 1000);
            }
        }
    }

    function resetLoginAttempts() {
        loginAttempts = 0;
        document.getElementById('connexion-button').disabled = false;
        document.getElementById('connexion-button').classList.remove("btn-danger");
    }
</script>

</body>
</html>
