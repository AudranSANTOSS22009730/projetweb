<?php
include "config.php";
if(isset($_GET['id']) AND !empty($_GET['id'])) {
    $get_id = htmlspecialchars($_GET['id']);
    $article = $conn->prepare('SELECT * FROM articles WHERE id = ?');
    $article->execute(array($get_id));
    if($article->rowCount() == 1) {
        $article = $article->fetch();
        $id = $article['id'];
        $titre = $article['titre'];
        $contenu = $article['contenu'];
        $likes = $conn->prepare('SELECT id FROM likes WHERE id_article = ?');
        $likes->execute(array($id));
        $likes = $likes->rowCount();
        $dislikes = $conn->prepare('SELECT id FROM dislikes WHERE id_article = ?');
        $dislikes->execute(array($id));
        $dislikes = $dislikes->rowCount();
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
<a href="action.php?t=1&id=<?= $id ?>">J'aime</a> (<?= $likes ?>)
<br />
<a href="action.php?t=2&id=<?= $id ?>">Je n'aime pas</a> (<?= $dislikes ?>)
<br>
<!-- Bouton pour retourner à l'accueil, css à modifier c'est moche -->
<br>
<a href="modules/blog/views/acceuil_view.php"><button>Retour à l'accueil</button></a>

</body>
</html>


