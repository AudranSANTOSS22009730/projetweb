<?php
require_once 'config.php'; // Inclut la connexion à la base de données
//var_dump($_POST);
//die();
// Vérifie si les variables requises existent et ne sont pas vides
if (!empty($_POST['pseudo'])  && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype']) && !empty($_POST['age']) && !empty($_POST['genre'])) {
    // Patch XSS
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['email']);
    $age = htmlspecialchars($_POST['age']);
    $genre = htmlspecialchars($_POST['genre']);
    $password = htmlspecialchars($_POST['password']);
    $password_retype = htmlspecialchars($_POST['password_retype']);

    // Vérifie si l'utilisateur existe
    $check = $conn->prepare('SELECT pseudo, age, genre, email, password FROM users WHERE email = ?');
    $check->bind_param('s', $email);
    $check->execute();
    $result = $check->get_result();
    $row = $result->num_rows;

    $email = strtolower($email); // Convertit l'e-mail en minuscules pour éviter les doublons d'adresses e-mail

    // Si la requête ne renvoie aucun résultat, l'utilisateur n'existe pas
    if ($row == 0) {
        if (strlen($pseudo) <= 100) { // Vérifie que la longueur du 'nom' est inférieure ou égale à 100
            if (strlen($email) <= 100) { // Vérifie que la longueur de 'email' est inférieure ou égale à 100
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // Vérifie si l'e-mail est au bon format
                    if ($password === $password_retype) { // Vérifie si les deux mots de passe saisis correspondent

                        // Hachage du mot de passe en utilisant Bcrypt avec un coût de 12
                        //$cost = ['cost' => 12];
                        //$password = password_hash($password, PASSWORD_BCRYPT, $cost);

                        // Stocke l'adresse IP
                        $ip = $_SERVER['REMOTE_ADDR'];

                        // Génère un jeton
                        $token = bin2hex(openssl_random_pseudo_bytes(64));

                        // Insère les données dans la base de données
                        $insert = $conn->prepare('INSERT INTO users(pseudo, password, email, age, genre, ip, token) VALUES(?, ?, ?, ?, ?, ?, ?)');
                        $insert->bind_param('sssssss', $pseudo, $password, $email, $age, $genre, $ip, $token);
                        $insert->execute();

                        // Redirection avec un message de succès
                        header('Location:inscription.php?reg_err=success');
                        die();
                    } else {
                        header('Location: inscription.php?reg_err=password');
                        die();
                    }
                } else {
                    header('Location: inscription.php?reg_err=email');
                    die();
                }
            } else {
                header('Location: inscription.php?reg_err=email_length');
                die();
            }
        } else {
            header('Location: inscription.php?reg_err=pseudo_length');
            die();
        }
    }
    } else {
        header('Location: inscription.php?reg_err=already');
        die();

}
?>
