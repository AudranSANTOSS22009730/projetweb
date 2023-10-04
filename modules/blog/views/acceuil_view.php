<?php
$publicationModel = new PublicationModel();
$Publications = $publicationModel->getPublications();

session_start();
require_once '../../../config.php';
require_once '../models/users_model.php';

if (class_exists('PublicationModel')) {
    $publicationModel = new PublicationModel();
    $Publications = $publicationModel->getPublications();
} else {
    echo "PublicationModel class not found.";
}
?>

<!-- view.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Accueil - Mon Réseau Social</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
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
            <button>Amis</button>
            <button>Accueil</button>
            <button>Messages</button>
        </div>

        <!-- Publications des utilisateurs -->
        <div class="posts">
            <?php foreach ($Publications as $publication) : ?>
                <div class="post">
                    <p><strong><?php echo $publication['auteur']; ?></strong></p>
                    <p><?php echo $publication['contenu']; ?></p>
                    <!-- Ajoutez ici des boutons pour les actions sur la publication (j'aime, commenter, etc.) -->
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</div>
</body>
</html>
