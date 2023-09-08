<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device width, initial-scale=1">
    <title>Forgot password</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<div class="login">
    <form action="process_login.php" method="post">
        <h1>Recover a password</h1>
        <p>Entrez votre email</p>
        <input type="email" name="email">
        <input type="submit" name="submit" value="Send">
    </form>
    <p>Vous n'avez pas de compte ? <a href="signin.php">S'inscrire</a></p>
    <script src="password-strength.js"></script>

</div>
</body>
</html>
