<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="NoS1gnal"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../_assets/styles/inscription.css">
    <script src="../../../_assets/scripts/Inscription.js"></script>
    <script src="../../../_assets/scripts/SecureMdp.js"></script>
    <title>Inscription</title>
</head>
<body>
<div class="login-form">
    <form action="inscription_view.php" method="post">
        <h2 class="text-center">Inscription</h2>
        <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" class="form-control" placeholder="Pseudo" required="required" autocomplete="on">
        </div>
        <div class="form-group">
            <label for="email">Adresse mail</label>
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
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Inscription</button>
        </div>
    </form>
    <p class="text-center">Déjà inscrit ? <a href="connexion_view.php">Connectez-vous ici</a></p>
    <p>Pas encore inscrit ? <a href="acceuil_view.php" class="btn">Acceuil raccourcis teh les fous</a></p>
</div>
</body>
</html>