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
    <link rel="stylesheet" type="text/css" href="../../../_assets/styles/acceuil.css">
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
            <button onclick="location.href='../../../amis.php'">Amis</button>
            <button onclick="location.href='../../../redaction.php'">Rédiger un article</button>
            <button onclick="location.href='../../../reception.php'">Messages</button>


        </div>
        <!-- Ajouté juste avant les publications des utilisateurs -->


        <?php while($a = $articles->fetch()) { ?>
            <li><a href="../../../article.php?id=<?= $a['id'] ?>"><?= $a['titre'] ?></a> | <a href="../../../redaction.php?edit=<?= $a['id'] ?>">Modifier</a> | <a href="../../../supprimer.php?id=<?= $a['id'] ?>">Supprimer</a></li>
        <?php } ?>
        <ul>
</div>
    </main>
</div>
</body>
</html>
