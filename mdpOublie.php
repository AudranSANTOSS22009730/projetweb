<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="NoS1gnal"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="_assets/styles/mdpOublie.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="icon" href="wapp_icon.png" type="image/png">
    <title>Mot de passe oublié</title>
</head>
<body>
<div class="passwordRecovery-form">
    <form method="post">
        <h2 class="text-center">Mot de passe oublié</h2>
        <div class="form-group">
            <input type="email" name="email_oublie" id="email_oublie" class="form-control" placeholder="Email" required="required" autocomplete="off">
        </div>
        <?php
        if(!empty($_POST["email_oublie"])){
            $query="select * from user where email=:mail";
            $stmt = $pdo->prepare($query);
            $stmt->execute(["mail"=>$_POST["email_oublie"]]);
            $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
            var_dump($user_data);
            if (!$user_data) {
                $msg = "Utilisateur non existant";
                $response=[
                    "value"=>false,
                    "msg"=>$msg
                ];
            }
        }

        /*if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $to_email = $_POST['email'];

            if (filter_var($to_email, FILTER_VALIDATE_EMAIL)) {
                $subject = 'Réinitialisation de mot de passe';
                $message = 'Cliquez sur le lien suivant pour reinitialiser votre mot de passe : ';
                $headers = 'From: wap@alwaysdata.net';

                mail($to_email, $subject, $message, $headers);
                echo '<div class="alert alert-success">Mail de récupération envoyé</div>';
            } else {
                echo '<div class="alert alert-danger">Adresse e-mail invalide. Veuillez entrer une adresse e-mail valide.</div>';
            }
        }*/
        ?>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Suivant</button>
        </div>
    </form>
    <p class="text-center"><a href="index.php">Se connecter</a></p>
</div>
</body>
</html>
