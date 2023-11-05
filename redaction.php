<?php
include "config.php";	$mode_edition = 0;

// Vérifie si le paramètre 'edit' est présent dans l'URL
if(isset($_GET['edit']) AND !empty($_GET['edit'])) {
    $mode_edition = 1;
    $edit_id = htmlspecialchars($_GET['edit']);

    // Récupère l'article à éditer depuis la base de données
    $edit_article = $conn->prepare('SELECT * FROM articles WHERE id = ?');
    $edit_article->execute(array($edit_id));

    // Vérifie si l'article existe
    if($edit_article-> rowCount()== 1) {
        $edit_article = $edit_article->fetch();
    } else {
        die('Erreur : l\'article n\'existe pas...');
    }
}
// Vérifie si le formulaire d'envoi d'article est soumis
if(isset($_POST['article_titre'], $_POST['article_contenu'])) {
    if(!empty($_POST['article_titre']) AND !empty($_POST['article_contenu'])) {

        $article_titre = htmlspecialchars($_POST['article_titre']);
        $article_contenu = htmlspecialchars($_POST['article_contenu']);

        // Si le mode édition est désactivé, insère un nouvel article dans la base de données
        if($mode_edition == 0) {
            $ins = $conn->prepare('INSERT INTO articles (titre, contenu, date_time_publication) VALUES (?, ?, NOW())');
            $ins->execute(array($article_titre, $article_contenu));
            $message = 'Votre article a bien été posté';
            // Si le mode édition est activé, met à jour l'article existant
        } else {
            $update = $conn->prepare('UPDATE articles SET titre = ?, contenu = ?, date_time_edition = NOW() WHERE id = ?');
            $update->execute(array($article_titre, $article_contenu, $edit_id));
            header('Location: article.php?id='.$edit_id);
            $message = 'Votre article a bien été mis à jour !';
        }
    } else {
        $message = 'Veuillez remplir tous les champs';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Rédaction / Edition</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="_assets/styles/redaction.css">

</head>
<body>
<form method="POST">
    <input type="text" name="article_titre" placeholder="Titre"<?php if($mode_edition == 1) { ?> value="<?=
    $edit_article['titre'] ?>"<?php } ?> /><br />
    <textarea name="article_contenu" placeholder="Contenu de l'article"><?php if($mode_edition == 1) { ?><?=
            $edit_article['contenu'] ?><?php } ?></textarea><br />
    <input type="submit" value="Envoyer l'article" />
</form>
<br />
<!-- Affiche un message si nécessaire -->
<?php if(isset($message)) { echo $message; } ?>

<!-- Bouton pour retourner à l'accueil -->
<br>
<a href="modules/blog/views/acceuil_view.php"><button>Retour à l'accueil</button></a>



</body>
</html>