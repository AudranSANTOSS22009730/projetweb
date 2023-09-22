<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="NoS1gnal"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Mot de passe oublié</title>
    <style>
        body {
            background-color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .passwordRecovery-form {
            background-color: rgb(255, 213, 43);
            color: black;
            width: 340px;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }
        .passwordRecovery-form h2 {
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
<div class="passwordRecovery-form">
    <form method="post">
        <h2 class="text-center">Mot de passe oublié</h2>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
        </div>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $to_email = $_POST['email'];

            if (filter_var($to_email, FILTER_VALIDATE_EMAIL)) {
                $subject = 'Réinitialisation de mot de passe';
                $message = 'Cliquez sur le lien suivant pour réinitialiser votre mot de passe : ';
                $headers = 'From: wap@alwaysdata.net';

                mail($to_email, $subject, $message, $headers);
                echo '<div class="alert alert-success">Mail de récupération envoyé</div>';
            } else {
                echo '<div class="alert alert-danger">Adresse e-mail invalide. Veuillez entrer une adresse e-mail valide.</div>';
            }
        }
        ?>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Suivant</button>
        </div>
    </form>
    <p class="text-center"><a href="index.php">Se connecter</a></p>
</div>
</body>
</html>