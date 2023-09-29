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
<?php include('header.php'); ?>

<div class="container">
    <?php include('sidebar.php'); ?>

    <main>
        <!-- Barre de recherche -->
        <div class="search-bar">
            <input type="text" placeholder="Rechercher...">
            <button>Rechercher</button>
        </div>

        <!-- Formulaire de connexion -->
        <form action="controller.php" method="post">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Mot de passe">
            <button type="submit">Se connecter</button>
        </form>
    </main>
</div>

<?php include('footer.php'); ?>
</body>
</html>
