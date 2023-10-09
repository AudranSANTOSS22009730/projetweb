<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="../../../_assets/styles/connexion.css">
    <link rel="icon" href="wapp_icon.png" type="image/png">
</head>
<body>
<div class="container">
    <form action="../views/acceuil_view.php" method="post" class="login-form"> <!-- Ajout de la classe "login-form" -->
        <div class="form-group">
            <label for="email">Adresse mail</label>
            <input type="email" name="email" id="email" placeholder="votreadressemail@.com" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" placeholder="motdepasse" required>
        </div>
        <button type="submit">Se connecter</button>
        <p>Pas encore inscrit ? <a href="inscription_view.php" class="btn">Inscription</a></p>
        <p>Mot de passe oublier ? <a href="MotDePasseOublie.php" class="btn">Mot de passe oublier</a></p>

    </form>
</div>

    </form>
</div>
</body>
</html>
