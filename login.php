<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device width, initial-scale=1">
    <title>Form Login and Register</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<div class="login">
        <form action="process_login.php" method="post">
            <h1>Login</h1>
            <p>Email</p>
            <input type="email" name="email">
            <p>Mot de passe</p>
            <input type="password" name="password"><br><br>
            <input type="submit" name="submit" value="Login">
        </form>
        <p>Vous n'avez pas de compte ? <a href="signin.php">S'inscrire</a></p>
        <p>Vous avez oublié votre mot de passe ? <a href="passwordforgotten.php">Mot de passe oublié</a></p>
    <script src="password-strength.js"></script>

</div>
</body>
</html>
