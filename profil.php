<?php
session_start();

include "config.php";

if(isset($_GET['id']) AND $_GET['id'] > 0) {
    $getid = intval($_GET['id']);
    $requser = $conn->prepare('SELECT * FROM users WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
    ?>
    <html>
    <head>
        <title>Profil</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="_assets/styles/profil.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">

    </head>
    <body>
    <div align="center">
        <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
        <br /><br />
        Pseudo = <?php echo $userinfo['pseudo']; ?>
        <br />
        Mail = <?php echo $userinfo['email']; ?>
        <br />
        Date de création du compte = <?php echo $userinfo['date_time_creation']; ?>
        <br />
        <?php
        if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
            ?>
            <a href="modules/blog/views/acceuil_view.php">Acceder à l'acceuil</a>
            <div class="profile-actions">
                <a href="editionprofil.php">Editer mon profil</a>
                <a href="deconnexion.php">Se déconnecter</a>
            </div>
            <?php
        }
        ?>
    </div>
    </body>
    </html>
    <?php
}
?>