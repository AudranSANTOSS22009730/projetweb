// profil_view.php

echo "Nom: " . $user['nom'];
echo "Prénom: " . $user['prenom'];
echo "Email: " . $user['email'];
echo "Date d'inscription: " . $user['date_inscription'];

// Formulaire pour afficher et éditer la biographie
echo "<form action='path_to_controller' method='post'>";
    echo "<textarea name='bio'>" . $user['bio'] . "</textarea>";
    echo "<input type='submit' value='Mettre à jour'>";
    echo "</form>";
