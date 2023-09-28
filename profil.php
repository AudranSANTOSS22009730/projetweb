<?php
// Inclure ici la connexion à la base de données et les fonctions nécessaires pour récupérer les informations de l'utilisateur
// Exemple : include('includes/db.php');

// Supposons que vous avez récupéré les informations de l'utilisateur depuis la base de données dans un tableau $user.
$user = [
    'id' => 1,
    'username' => 'utilisateur1',
    'nom' => 'Nom de l\'utilisateur',
    'email' => 'utilisateur@email.com',
    'bio' => 'Description de l\'utilisateur...',
    // Autres informations du profil
];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Profil de <?php echo $user['username']; ?></title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="icon" href="wapp_icon.png" type="image/png">
</head>
<body>
<?php include('includes/header.php'); ?>

<div class="container">
    <?php include('includes/sidebar.php'); ?>

    <main>
        <div class="profile">
            <h1><?php echo $user['nom']; ?></h1>
            <p>@<?php echo $user['username']; ?></p>
            <p><?php echo $user['email']; ?></p>
            <p><?php echo $user['bio']; ?></p>
            <!-- Autres informations du profil -->
        </div>

        <!-- Afficher les publications de l'utilisateur ici -->
    </main>
</div>

<?php include('includes/footer.php'); ?>
</body>
</html>