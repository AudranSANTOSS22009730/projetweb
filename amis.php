<?php
session_start();
require 'config.php';

// Récupère la liste d'amis de l'utilisateur connecté
$query = $conn->prepare("SELECT * FROM friends WHERE pseudo_1 = :pseudo_1 OR pseudo_2 = :pseudo_2");
$query->execute([
    "pseudo_1" => $_SESSION['pseudo'],
    "pseudo_2" => $_SESSION['pseudo']
]);
$data  = $query->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Amis</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="_assets/styles/amis.css">
</head>
<body>
<div class="container">
    <h1>Bienvenue <?php echo htmlspecialchars($_SESSION['pseudo']); ?></h1>

    <h2>Liste d'amis :</h2>
    <div class="friend-list">
        <?php foreach ($data as $ami): ?>
            <div class="friend-item">
                <?php
                // Détermine le pseudo de l'autre utilisateur
                $other_pseudo = $ami['pseudo_1'] === $_SESSION['pseudo'] ? $ami['pseudo_2'] : $ami['pseudo_1'];

                // Vérifie si la demande d'ami est en attente d'acceptation
                $is_pending = $ami['is_pending'] === '1';
                echo htmlspecialchars($other_pseudo);
                // Affiche un statut si la demande d'ami est en attente d'acceptation
                if ($ami['pseudo_2'] === $_SESSION['pseudo'] && $is_pending) {
                    echo " <span class='status pending'>en attente d'être accepté</span>";
                }
                ?>
            </div>
        <?php endforeach; ?>
    </div>

    <h2>Demandes d'amis :</h2>
    <div class="pending-requests">
        <?php foreach ($data as $ami): ?>
            <?php if ($ami["is_pending"] === '1' && $ami['pseudo_2'] === $_SESSION['pseudo']): ?>
                <div class="pending-item">
                    <?php echo htmlspecialchars($ami['pseudo_1']). " <a href='#' class='accept-link'>Accepter</a>"; ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <h2>Autres utilisateurs :</h2>

</div>
</body>
</html>
