<!-- view.php -->

<?php
// Inclure le contrôleur
include('modules/blog/controlers/acceuil_controler.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Accueil - Mon Réseau Social</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="icon" href="wapp_icon.png" type="image/png">
</head>
<body>
<?php include('includes/header.php'); ?>

<div class="container">
    <?php include('includes/sidebar.php'); ?>

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
            <?php foreach ($publications as $publication) : ?>
                <div class="post">
                    <p><strong><?php echo $publication['auteur']; ?></strong></p>
                    <p><?php echo $publication['contenu']; ?></p>
                    <!-- Ajoutez ici des boutons pour les actions sur la publication (j'aime, commenter, etc.) -->
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</div>

<?php include('includes/footer.php'); ?>
</body>
</html>
