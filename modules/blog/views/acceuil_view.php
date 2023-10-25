<!-- accueil_view.php -->
<?php
include "../../../config.php";


$articles = $conn->query('SELECT * FROM articles ORDER BY date_time_publication DESC');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="../_assets/styles/accueil.css">
    <link rel="icon" href="wapp_icon.png" type="image/png">
</head>
<body>

<div class="container">
    <main>
        <!-- Barre de recherche -->
        <div class="search-bar">
            <input type="text" placeholder="Rechercher...">
            <button>Rechercher</button>
        </div>

        <!-- Boutons de navigation -->
        <div class="nav-buttons">
            <button onclick="location.href='amis_page.php'">Amis</button>
            <button onclick="location.href='accueil_page.php'">Accueil</button>
            <button onclick="location.href='messages_page.php'">Messages</button>
            <button onclick="location.href='profil_page.php'">Profil</button>
        </div>
        <!-- Ajouté juste avant les publications des utilisateurs -->


        <?php while($a = $articles->fetch_assoc()) { ?>
            <li><a href="../../../article.php?id=<?= $a['id'] ?>"><?= $a['titre'] ?></a> | <a href="../../../redaction.php?edit=<?= $a['id'] ?>">Modifier</a> | <a href="../../../supprimer.php?id=<?= $a['id'] ?>">Supprimer</a></li>
        <?php } ?>
        <ul>
            <!-- Bouton pour rediger un article, css à modifier c'est moche -->
            <a href="../../../redaction.php"><button>Rédiger un article</button></a>




        </div>
    </main>
</div>
</body>
</html>
