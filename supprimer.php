<?php
include "config.php";

// Vérifie si l'identifiant de l'article à supprimer est présent dans l'URL
if(isset($_GET['id']) AND !empty($_GET['id'])) {
    $suppr_id = htmlspecialchars($_GET['id']);

    // Prépare la requête pour supprimer l'article avec l'identifiant spécifié
    $suppr = $conn->prepare('DELETE FROM articles WHERE id = ?');
    $suppr->execute(array($suppr_id));
    // Redirige vers une page ou une URL appropriée après la suppression de l'article
    header('Location: '); // Vous devez spécifier une URL de redirection ici


}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Rédaction / Edition</title>
    <meta charset="utf-8">
</head>
<body>


<!-- Bouton pour retourner à l'accueil -->
<br>
<a href="modules/blog/views/acceuil_view.php"><button>Retour à l'accueil</button></a>

</body>
</html>
