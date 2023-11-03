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
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">

    </head>
    <body>
    <div class="barreDeNavigation">
        <div class="haut">
            <div class="logo">
                <i class="bx bxl-codepen"></i>
                <span>Wapp</span>
            </div>
            <i class="bx bx-menu" id="btn"></i>
        </div>
        <div class="utilisateur">
            <img src="wapp_icon.png" class="image-Utilisateur" alt="utilisateur">
            <div>
                <p class="bold">Clint B.</p>
                <p>Admin</p>
            </div>
        </div>
        <ul>
            <li>
                <a href="#">
                    <i class="bx bxs-grid-alt"></i>
                    <span class="nav-item">Accueuil</span>
                </a>
                <span class="tooltip">Accueuil</span>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-body"></i>
                    <span class="nav-item">Profil</span>
                </a>
                <span class="tooltip">Profil</span>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-log-out"></i>
                    <span class="nav-item">Déconnexion</span>
                </a>
                <span class="tooltip">Déconnexion</span>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <div class="conteneur">
            <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
        </div>
    </div>

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

    <script>
        let btn = document.querySelector('#btn')
        let sidebar = document.querySelector('.barreDeNavigation')

        btn.onclick = function (){
            sidebar.classList.toggle('active')
        }
    </script>

    </html>
    <?php
}
?>