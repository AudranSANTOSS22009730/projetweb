<?php
// Inclure ici la connexion à la base de données et les fonctions nécessaires pour récupérer la liste d'amis de l'utilisateur
// Exemple : include('includes/db.php');

// Supposons que vous avez récupéré la liste d'amis de l'utilisateur depuis la base de données dans un tableau $friends.
$friends = [
    ['id' => 2, 'nom' => 'Ami 1'],
    ['id' => 3, 'nom' => 'Ami 2'],
    ['id' => 4, 'nom' => 'Ami 3'],
    // Autres amis de l'utilisateur
];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Amis de l'utilisateur</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="icon" href="wapp_icon.png" type="image/png">
</head>
<body>
<?php include('includes/header.php'); ?>

<div class="container">
    <?php include('includes/sidebar.php'); ?>

    <main>
        <h1>Amis de l'utilisateur</h1>
        <ul>
            <?php foreach ($friends as $friend) : ?>
                <li>
                    <a href="profile.php?id=<?php echo $friend['id']; ?>"><?php echo $friend['nom']; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </main>
</div>

<?php include('includes/footer.php'); ?>
</body>
</html>