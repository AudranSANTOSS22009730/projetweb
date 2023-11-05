<!-- accueil_view.php -->
<?php
session_start();
include "../../../config.php";

$articles = $conn->query('SELECT * FROM articles ORDER BY date_time_publication DESC');
if(isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="../../../_assets/styles/acceuil.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="../../../wapp_icon.png" type="image/png">
</head>
<body>

<div class="barreDeNavigation">
    <div class="haut">
        <div class="logo">
            <img src="../../../wapp_icon.png" class="image-logo" alt="logo">
            <span>app</span>
        </div>
        <i class="bx bx-menu" id="btn"></i>
    </div>
    <div class="utilisateur">
        <img src="../../../wapp_icon.png" class="image-Utilisateur" alt="utilisateur">
        <div>
            <p class="bold"><?php echo $user['pseudo']; ?></p>
            <p>Admin</p>
        </div>
    </div>
    <ul>
        <li>
            <a href="acceuil_view.php">
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
            <a href="../../../deconnexion.php">
                <i class="bx bx-log-out"></i>
                <span class="nav-item">Déconnexion</span>
            </a>
            <span class="tooltip">Déconnexion</span>
        </li>
    </ul>
</div>

<div class="conteneur-principale">
    <main>
        <!-- Barre de recherche -->
        <div class="search-bar">
            <input type="text" placeholder="Rechercher...">
            <button>Rechercher</button>
        </div>

        <!-- Boutons de navigation -->
        <div class="nav-buttons">
            <button onclick="location.href='../../../amis.php'">Amis</button>
            <button onclick="location.href='../../../redaction.php'">Rédiger un article</button>
            <button onclick="location.href='../../../reception.php'">Messages</button>


        </div>
        <!-- Ajouté juste avant les publications des utilisateurs -->


        <?php while($a = $articles->fetch()) { ?>
            <li><a href="../../../article.php?id=<?= $a['id'] ?>"><?= $a['titre'] ?></a> | <a href="../../../redaction.php?edit=<?= $a['id'] ?>">Modifier</a> | <a href="../../../supprimer.php?id=<?= $a['id'] ?>">Supprimer</a></li>
        <?php } ?>
        <ul>
    </main>
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
