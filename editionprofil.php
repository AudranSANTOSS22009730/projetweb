<?php
session_start();

include "config.php";

if(isset($_SESSION['id'])) {
    $requser = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo']) {
        $newpseudo = htmlspecialchars($_POST['newpseudo']);
        $insertpseudo = $conn->prepare("UPDATE users SET pseudo = ? WHERE id = ?");
        $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
        header('Location: profil.php?id='.$_SESSION['id']);
    }
    if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail']) {
        $newmail = htmlspecialchars($_POST['newmail']);
        $insertmail = $conn->prepare("UPDATE users SET email = ? WHERE id = ?");
        $insertmail->execute(array($newmail, $_SESSION['id']));
        header('Location: profil.php?id='.$_SESSION['id']);
    }
    if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
        $mdp1 = sha1($_POST['newmdp1']);
        $mdp2 = sha1($_POST['newmdp2']);
        if($mdp1 == $mdp2) {
            $insertmdp = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
            $insertmdp->execute(array($mdp1, $_SESSION['id']));
            header('Location: profil.php?id='.$_SESSION['id']);
        } else {
            $msg = "Vos deux mdp ne correspondent pas !";
        }
    }
    ?>
    <html>
    <head>
        <title>Edition Profil</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="_assets/styles/editionprofil.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    </head>

    <body>
    <div class="barreDeNavigation">
        <div class="haut">
            <div class="logo">
                <img src="wapp_icon.png" class="image-logo" alt="logo">
                <span>app</span>
            </div>
            <i class="bx bx-menu" id="btn"></i>
        </div>
        <div class="utilisateur">
            <img src="wapp_icon.png" class="image-Utilisateur" alt="utilisateur">
            <div>
                <p class="bold"><?php echo $user['pseudo']; ?></p>
                <p>Admin</p>
            </div>
        </div>
        <ul>
            <li>
                <a href="modules/blog/views/acceuil_view.php">
                    <i class="bx bxs-grid-alt"></i>
                    <span class="nav-item">Accueuil</span>
                </a>
                <span class="tooltip">Accueuil</span>
            </li>
            <li>
                <a href="">
                    <i class="bx bx-body"></i>
                    <span class="nav-item">Profil</span>
                </a>
                <span class="tooltip">Profil</span>
            </li>
            <li>
                <a href="deconnexion.php">
                    <i class="bx bx-log-out"></i>
                    <span class="nav-item">Déconnexion</span>
                </a>
                <span class="tooltip">Déconnexion</span>
            </li>
        </ul>
    </div>

    <div class="conteneur-principale">
        <div class="conteneur">
            <div align="center">
                <h2>Edition de mon profil</h2>
                <div align="left">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <label>Pseudo :</label>
                        <input type="text" name="newpseudo" placeholder="Pseudo" value="<?php echo $user['pseudo']; ?>" /><br /><br />
                        <label>Mail :</label>
                        <input type="text" name="newmail" placeholder="Mail" value="<?php echo $user['email']; ?>" /><br /><br />
                        <label>Mot de passe :</label>
                        <input type="password" name="newmdp1" placeholder="Mot de passe"/><br /><br />
                        <label>Confirmation - mot de passe :</label>
                        <input type="password" name="newmdp2" placeholder="Confirmation du mot de passe" /><br /><br />
                        <input type="submit" value="Mettre à jour mon profil !" />
                    </form>
                    <?php if(isset($msg)) { echo $msg; } ?>
                </div>
            </div>
        </div>
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
else {
    header("Location: connexion.php");
}
?>