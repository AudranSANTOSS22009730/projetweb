<?php
// Inclure ici la connexion à la base de données et les fonctions nécessaires pour récupérer les messages de l'utilisateur
// Exemple : include('includes/db.php');

// Supposons que vous avez récupéré les messages de l'utilisateur depuis la base de données dans un tableau $messages.
$messages = [
    ['id' => 1, 'expediteur_id' => 2, 'destinataire_id' => 1, 'contenu' => 'Salut, comment ça va ?'],
    ['id' => 2, 'expediteur_id' => 1, 'destinataire_id' => 2, 'contenu' => 'Bonjour ! Je vais bien, merci. Et toi ?'],
    // Autres messages de la messagerie
];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Messagerie de l'utilisateur</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="icon" href="wapp_icon.png" type="image/png">
</head>
<body>
<?php include('includes/header.php'); ?>

<div class="container">
    <?php include('includes/sidebar.php'); ?>

    <main>
        <h1>Messagerie</h1>
        <ul>
            <?php foreach ($messages as $message) : ?>
                <li>
                    <p><strong>De :</strong> Utilisateur <?php echo $message['expediteur_id']; ?></p>
                    <p><?php echo $message['contenu']; ?></p>
                </li>
            <?php endforeach; ?>
        </ul>

        <!-- Formulaire pour envoyer un nouveau message -->
        <form action="send_message.php" method="post">
            <label for="message">Nouveau Message :</label>
            <textarea id="message" name="message" rows="4" cols="50"></textarea>
            <button type="submit">Envoyer</button>
        </form>
    </main>
</div>

<?php include('includes/footer.php'); ?>
</body>
</html>