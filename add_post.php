<?php
// Inclure ici la connexion à la base de données
include("connexion.php");

// Vérifier si le formulaire a été soumis
if(isset($_POST["valider"])) {
    // Vérifier si un fichier a été envoyé
    if(isset($_FILES["image"])) {
        // Récupérer les informations sur l'image
        $nom_image = $_FILES["image"]["name"];
        $taille_image = $_FILES["image"]["size"];
        $type_image = $_FILES["image"]["type"];
        $chemin_temporaire = $_FILES["image"]["tmp_name"];

        // Vérifier si le fichier est une image (vous pouvez ajouter d'autres vérifications ici)
        if (strpos($type_image, 'image') !== false) {
            // Préparer et exécuter la requête pour insérer l'image dans la base de données
            $req = $pdo->prepare("INSERT INTO images (nom, taille, type, bin) VALUES (?, ?, ?, ?)");
            $req->execute(array($nom_image, $taille_image, $type_image, file_get_contents($chemin_temporaire)));

            // Vous pouvez ajouter d'autres étapes ici, comme ajouter la publication associée à cette image dans une autre table, etc.

            // Rediriger vers une page de confirmation ou d'accueil
            header("Location: index.php");
            exit;
        } else {
            $erreur = "Le fichier n'est pas une image valide.";
        }
    } else {
        $erreur = "Aucun fichier image n'a été sélectionné.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ajouter une Image</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<?php include('includes/header.php'); ?>

<div class="container">
    <?php include('includes/sidebar.php'); ?>

    <main>
        <h1>Ajouter une Image</h1>

        <?php if (isset($erreur)) : ?>
            <p><?php echo $erreur; ?></p>
        <?php endif; ?>

        <form action="add_post.php" method="post" enctype="multipart/form-data">
            <label for="image">Sélectionnez une image :</label>
            <input type="file" id="image" name="image">
            <button type="submit" name="valider">Valider</button>
        </form>
    </main>
</div>

<?php include('includes/footer.php'); ?>
</body>
</html>