<?php
include "config.php";
if(isset($_GET['id']) AND !empty($_GET['id'])) {
    $get_id = htmlspecialchars($_GET['id']);
    $article = $conn->prepare('SELECT * FROM articles WHERE id = ?');
    $article->execute(array($get_id));
    if($article->num_rows == 1) {
        $article = $article->fetch_assoc();
        $titre = $article['titre'];
        $contenu = $article['contenu'];
    } else {
        die('Cet article n\'existe pas !');
    }
} else {
    die('Erreur');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <meta charset="utf-8">
</head>
<body>
<h1><?= $titre ?></h1>
<p><?= $contenu ?></p>
</body>
</html>