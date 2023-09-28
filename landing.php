<?php
session_start();
require_once 'config.php'; // ajout connexion bdd
// si la session existe pas soit si l'on est pas connecté on redirige
if(!isset($_SESSION['user'])){
    header('Location:index.php');
    die();
}

// On récupère les données de l'utilisateur
$req = $conn->prepare('SELECT * FROM users WHERE token = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch();
?>
<!doctype html>
<html lang="en">
<head>
    <title>Espace membre</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Liens vers les fichiers CSS -->
    <link rel="stylesheet" type="text/css" href="_assets/styles/landing.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="icon" href="wapp_icon.png" type="image/png">
</head>
<body>
<div class="container">
    <?php
    if(isset($_GET['err'])){
        $err = htmlspecialchars($_GET['err']);
        switch($err){
            case 'current_password':
                echo "<div class='alert alert-danger'>Le mot de passe actuel est incorrect</div>";
                break;

            case 'success_password':
                echo "<div class='alert alert-success'>Le mot de passe a bien été modifié ! </div>";
                break;
        }
    }
    ?>

    <div class="text-center">
        <h1 class="p-5">Bonjour <?php echo $data['pseudo']; ?> !</h1>
        <hr />
        <a href="deconnexion.php" class="btn btn-danger btn-lg">Déconnexion</a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#change_password">
            Changer mon mot de passe
        </button>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <!-- Contenu du modal -->
</div>

<div class="modal fade" id="avatar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <!-- Contenu du modal -->
</div>

<!-- Liens vers les fichiers JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
