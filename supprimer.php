<?php
include "config.php";

if(isset($_GET['id']) AND !empty($_GET['id'])) {
    $suppr_id = htmlspecialchars($_GET['id']);
    $suppr = $conn->prepare('DELETE FROM articles WHERE id = ?');
    $suppr->execute(array($suppr_id));
    header('Location: ');


}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Rédaction / Edition</title>
    <meta charset="utf-8">
</head>
<body>


<!-- Bouton pour retourner à l'accueil, css à modifier c'est moche -->
<br>
<a href="modules/blog/views/acceuil_view.php"><button>Retour à l'accueil</button></a>



</body>
</html>
