<?php
include "config.php";


$articles = $conn->query('SELECT * FROM articles ORDER BY date_time_publication DESC');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <meta charset="utf-8">
</head>
<body>
<ul>
    <?php while($a = $articles->fetch_assoc()) { ?>
        <li><a href="article.php?id=<?= $a['id'] ?>"><?= $a['titre'] ?></a> | <a href="redaction.php?edit=<?= $a['id'] ?>">Modifier</a> | <a href="supprimer.php?id=<?= $a['id'] ?>">Supprimer</a></li>
    <?php } ?>
    <ul>





        <!-- Bouton pour rediger un article, css à modifier c'est moche -->
        <a href="redaction.php"><button>Rédiger un article</button></a>




</body>
</html>