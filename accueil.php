<?php
// Inclure ici la connexion à la base de données et les fonctions nécessaires
// pour récupérer les publications des utilisateurs
// Exemple : include('includes/db.php');

// Supposons que vous avez récupéré les publications depuis la base de données dans un tableau $publications.
$publications = [
    ['id' => 1, 'auteur' => 'Utilisateur 1', 'contenu' => 'Première publication'],
    ['id' => 2, 'auteur' => 'Utilisateur 2', 'contenu' => 'Deuxième publication'],
    ['id' => 3, 'auteur' => 'Utilisateur 3', 'contenu' => 'Troisième publication'],
];

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