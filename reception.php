<?php
session_start();
include "config.php";

// Vérifie si l'utilisateur est connecté
if(isset($_SESSION['id']) AND !empty($_SESSION['id'])) {
    // Récupère les messages destinés à l'utilisateur connecté
    $msg = $conn->prepare('SELECT * FROM messages WHERE id_destinataire = ?');
    $msg->execute(array($_SESSION['id']));
    $msg_nbr = $msg->rowCount();
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Boîte de réception</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="_assets/styles/reception.css">
    </head>
    <body>
    <a href="envoie.php">Nouveau message</a><br /><br /><br />
    <h3>Votre boîte de réception:</h3>
    <?php
    if($msg_nbr == 0) { echo "Vous n'avez aucun message..."; }
    while($m = $msg->fetch()) {
        // Récupère le pseudo de l'expéditeur
        $p_exp = $conn->prepare('SELECT pseudo FROM users WHERE id = ?');
        $p_exp->execute(array($m['id_expediteur']));
        $p_exp = $p_exp->fetch();
        $p_exp = $p_exp['pseudo'];
        ?>
        <b><?= $p_exp ?></b> vous a envoyé: <br />
        <?= nl2br($m['message']) ?><br />
        -------------------------------------<br/>
    <?php } ?>
    </body>
    </html>
<?php } ?>