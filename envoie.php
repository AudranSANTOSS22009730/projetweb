<?php
// Démarre la session
session_start();
// Inclue le fichier de configuration pour la base de données
include "config.php";

// Vérifie si l'utilisateur est connecté (identifiant de session défini)
if(isset($_SESSION['id']) AND !empty($_SESSION['id'])) {
    // Vérifie si le formulaire d'envoi de message a été soumis
    if(isset($_POST['envoi_message'])) {
        // Vérifie si les champs destinataire et message sont définis et non vides
        if(isset($_POST['destinataire'],$_POST['message']) AND !empty($_POST['destinataire']) AND !empty($_POST['message'])) {
            $destinataire = htmlspecialchars($_POST['destinataire']); // Récupére et sécurise le destinataire
            $message = htmlspecialchars($_POST['message']); // Récupére et sécurise le message
            // Récupére l'ID du destinataire à partir de son pseudo
            $id_destinataire = $conn->prepare('SELECT id FROM users WHERE pseudo = ?');
            $id_destinataire->execute(array($destinataire));
            $dest_exist = $id_destinataire->rowCount();

            // Si le destinataire existe dans la base de données
            if($dest_exist == 1) {
                $id_destinataire = $id_destinataire->fetch();
                $id_destinataire = $id_destinataire['id'];

                // Insère le message dans la base de données
                $ins = $conn->prepare('INSERT INTO messages(id_expediteur,id_destinataire,message) VALUES (?,?,?)');
                $ins->execute(array($_SESSION['id'],$id_destinataire,$message));
                $error = "Votre message a bien été envoyé !"; // Affiche un message de confirmation
            } else {
                $error = "Cet utilisateur n'existe pas..."; // Affiche un message d'erreur
            }
        } else {
            $error = "Veuillez compléter tous les champs"; // Affiche un message d'erreur
        }
    }
    $destinataires = $conn->query('SELECT pseudo FROM users ORDER BY pseudo');
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Envoi de message</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="_assets/styles/envoie.css">
    </head>
    <body>
    <form method="POST">
        <label>Destinataire:</label>
        <!-- <select name="destinataire">
            <?php while($d = $destinataires->fetch()) { ?>
            <option><?= $d['pseudo'] ?></option>
            <?php } ?>
         </select> -->
        <input type="text" name="destinataire" /> <!-- Champ de saisie pour le destinataire -->
        <br /><br />
        <textarea placeholder="Votre message" name="message"></textarea> <!-- Champ de saisie pour le message -->
        <br /><br />
        <input type="submit" value="Envoyer" name="envoi_message" /> <!-- Bouton d'envoi -->
        <br /><br />
        <?php if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; } ?>
    </form>
    <br />
    <a href="reception.php">Boîte de réception</a> <!-- Lien vers la boîte de réception -->
    </body>
    </html>
    <?php
}
?>