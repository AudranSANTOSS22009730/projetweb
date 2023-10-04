if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {
// Redirect the authenticated user to the acceuil_view.php
header("Location: modules/blog/views/acceuil_view.php");
exit();
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="NoS1gnal"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="_assets/styles/index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="icon" href="wapp_icon.png" type="image/png">

    <title>Connexion ou Inscription</title>
    <style>
        /* Style pour l'image de fond */
        body {
            background-color: #202020;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url("_assets/images/2.png"); /* Ajout de l'image de fond */
            background-size: cover; /* Ajustement de la taille de l'image de fond */
            background-repeat: no-repeat;
        }

        .login-form {
            background-color: rgb(255, 213, 43);
            color: #202020;
            width: 340px;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            text-align: center; /* Centrer le contenu du formulaire */
        }

        .login-form h2 {
            margin: 0 0 15px;
        }

        .form-control, .btn {
            min-height: 38px;
            border-radius: 2px;
        }

        .btn {
            font-size: 15px;
            font-weight: bold;
            background-color: rgb(255, 213, 43);
            color: black; /* Texte noir par défaut */
            margin: 5px; /* Ajout de marges autour des boutons */
            padding: 15px 30px; /* Espacement intérieur des boutons agrandi */
            text-decoration: none; /* Supprimer le soulignement par défaut */
        }

        .btn:hover {
            text-decoration: underline; /* Soulignement au survol */
        }

        .cards {
            display: flex;
            flex-direction: column;
            gap: 15px;
            pointer-events: none;
        }

        .cards > * {
            pointer-events: auto;
        }

        .cards:hover > *:hover {
            transform: scale(1.1);
            filter: none;
        }

        .links-container {
            display: flex;
            justify-content: flex-end; /* Aligner les liens vers la droite */
            margin-top: 250px; /* Marge supérieure plus importante pour déplacer les liens plus bas */
            margin-left: 50px; /* Décalage vers la droite */
            text-align: center; /* Centrer le texte à l'intérieur du conteneur */
            color: white; /* Texte en blanc */
        }

        .links-container p {
            font-weight: bold;
        }

        .links-container a {
            border-radius: 5px;
            text-decoration: none; /* Supprimer le soulignement par défaut */
            margin-right: 50px; /* Espacement entre les liens */
        }

        /* Styles pour les écrans de taille moyenne et plus petits (tels que les appareils mobiles) */
        @media (max-width: 768px) {
            body {
                background-size: contain;
                background-position: center;
            }
        }

        * {
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<div class="links-container">
    <a href="modules/blog/views/connexion_view.php" class="btn">Connexion</a>
    <a href="modules/blog/views/inscription_view.php" class="btn">Inscription</a>
</div>
</body>
</html>

