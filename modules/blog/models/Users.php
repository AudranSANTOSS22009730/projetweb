<?php
namespace models;

use PDO;
use PDOException;
include '..\..\..\config.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



// Créez une connexion à la base de données

class Users {
    private $conn;

    public function __construct($conn) {
        // Initialisation de la propriété "$conn" de l'objet courant avec la valeur de "$conn" passé en argument
        $this->conn = $conn;
    }

    // Je crée une fonction privée nommée "connectwap_bd" pour établir une connexion à une base de données SQLite.
    private function connectwap_bd() {
        try {
            $servername = "mysql-wap.alwaysdata.net";
            $username = "wap";
            $password = "wapiutaix";
            $dbname = "wap_bd";
            $conn = new PDO($servername, $username, $password, $dbname);
            // Si la connexion réussit, je peux l'utiliser pour effectuer des opérations sur la base de données.

            // Je retourne l'objet de connexion pour une utilisation future.
            return $conn;
        } catch (PDOException $e) {
            return null;
        }
    }
// Déclaration d'une méthode constructeur publique

    public function UtilisateurExistant($pseudo)
    {
        // Je crée une requête SQL pour sélectionner tous les enregistrements de la table "users" où la colonne "pseudo" correspond à la valeur passée en argument.
        $query = "SELECT * FROM users WHERE pseudo=:pseudo";

        // J'obtiens une connexion à la base de données en utilisant la méthode "connectwap_bd()"
        // Ensuite, je prépare la requête SQL en utilisant la connexion obtenue.
        $stmt = $this->connectwap_bd()->prepare($query);

        // Je lie la valeur du paramètre ":pseudo" de la requête SQL à la valeur du paramètre "$pseudo" passé en argument.
        // J'indique également que "$pseudo" est une chaîne de caractères (PDO::PARAM_STR).
        $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);

        // J'exécute la requête préparée.
        $stmt->execute();
    }

    // Je définis une méthode publique nommée "MailExistant" qui vérifie si un utilisateur avec l'adresse e-mail donnée existe dans la base de données.
    public function MailExistant($email) {
        // Je crée une requête SQL pour sélectionner tous les enregistrements de la table "users" où la colonne "email" correspond à la valeur passée en argument.
        // La requête doit utiliser le signe de deux-points (:) pour définir le paramètre nommé "email".
        $query = "SELECT * FROM users WHERE email=:email";

        // J'obtiens une connexion à la base de données en utilisant la méthode "connectwap_bd()" (non montrée ici, mais probablement définie ailleurs dans la classe).
        // Ensuite, je prépare la requête SQL en utilisant la connexion obtenue.
        $stmt = $this->connectwap_bd()->prepare($query);

        // Je lie la valeur du paramètre nommé ":email" de la requête SQL à la valeur du paramètre "$email" passé en argument.
        // J'indique également que "$email" est une chaîne de caractères (PDO::PARAM_STR).
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        // J'exécute la requête préparée.
        $stmt->execute();
    }
    public function  AjoutUtilisateur($pseudo, $email, $age, $genre, $password, $ip, $token, $conn) {

        //$hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $insert = $conn->prepare('INSERT INTO users(pseudo, password, email, age, genre, ip, token) VALUES(?, ?, ?, ?, ?, ?, ?)');
        $insert->bind_param('sssssss', $pseudo, $password, $email, $age, $genre, $ip, $token);
        $stmt = $this->connectwap_bd()->prepare(insert);
        $insert->execute();

        $stmt -> bindParam('email', $email, PDO::PARAM_STR);
        //$stmt -> bindParam('password', $hashed_password, PDO::PARAM_STR);
        $stmt -> bindParam('pseudo', $pseudo, PDO::PARAM_STR);
        $existingUserByEmail = $this->MailExistant($email);
        $existingUserByPseudo = $this->UtilisateurExistant($pseudo);

        if ($existingUserByEmail) {
            header('Location: ../../index.php?erreur=email_existant');
            exit;
        } elseif ($existingUserByPseudo) {
            header('Location: ../../index.php?erreur=pseudo');
            exit;
        } else {
        $Users = new Users();
        $Users -> TrouverUtilsateur();
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
                        header('Location: ../views/inscription_view.php?reg_err=success');
                        die();
                    } else {
                        header('Location: ../views/inscription_view.php?reg_err=password');
                        die();
                    }
                } else {
                    header('Location: ../views/inscription_view.php.php?reg_err=email');
                    die();
                }
            } else {
                header('Location: ../views/inscription_view.php?reg_err=email_length');
                die();
            }
        } else {
            header('Location: ../views/inscription_view.php?reg_err=pseudo_length');
            die();
        }
    }
} else {
    header('Location: ../views/layout.php?reg_err=already');
    die();

}

    }
    }

    public function TrouverUtilsateur($email, $pseudo) {
        $query = "SELECT * FROM users WHERE (email = '$email' OR pseudo = $pseudo)";
        $stmt = $this->connectwap_bd() -> prepare($query);
        $stmt -> bindParam('email', $email, PDO::PARAM_STR);
        $stmt -> bindParam('pseudo', $pseudo, PDO::PARAM_STR);
        $stmt -> execute();


        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($pseudo && VerificationCode($email, $utilisateur)){
            session_start();
            $_SESSION['utilisateur_conn'] = true;
            $_SESSION['email'] = $utilisateur ['email'];
            $_SESSION['pseudo'] = $utilisateur ['pseudo'];

            header('Location: ../views/acceuil_views.php');
            exit;
        } else {
            header('Location: ../../index.php?erreur= motdepasseincorrect');
            exit;
        }

    }

    public function VerificationCode($email, $password) {
        // Requête SQL pour vérifier le code de réinitialisation du mot de passe
        $query = "SELECT codeMDPOublie FROM users WHERE email= email";
        $stmt = $this->connectwap_bd()->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $codewap_bd = $row['codeMDPOublie'];
            if ($codewap_bd == $password) {
                // Le code est correct, rediriger vers la page de changement de mot de passe
                header('Location: ../views/ChangementMDP.php');
                exit(); // Assurez-vous de quitter le script après la redirection.
            } else {
                // Le code est incorrect, vous pouvez gérer l'erreur ici (par exemple, afficher un message d'erreur)
                header('Location: ../../index.php?erreur=code_errone');
                exit;
            }
        } else {
            // L'utilisateur avec cet e-mail n'existe pas, vous pouvez gérer l'erreur ici
            header('Location: ../../index.php?erreur=email_inexistant');
            exit;
        }
    }
    public function resetMotDePasse($email)
    {
        if (!$this->MailExistant($email)) {
            header('Location: ../index.php?erreur=email_inexistant');
            exit;
        }
        $iduniq = iduniq(true);
        $code = strtoupper(substr($iduniq, -5));
        $query = "UPDATE users SET code = :code WHERE email = email";
        $stmt = $this->connectwap_bd()->prepare($query);
        $stmt->bindParam('code', $code, PDO::PARAM_STR);
        $stmt->bindParam('email', $email, PDO::PARAM_STR);

        if ($stmt->execute()) {
            require '\..\..\autoload.php';
            $mail = new PHPMailer(true);

            try {
                $mail->setLanguage('fr', '/optional/path/to/language/directory/');
                $mail->isSMTP();
                $mail->SMTPAuth = true;
                $mail->Username = 'wap.website.mail@gmail.com';
                $mail->Password = 'lyesYacineSoudani20042024:)r';
                $mail->SMTPSecure = "tls";
                $mail->Port = 587;
                $mail->setFrom('reguiglyes@gmail.com', 'Lyes');
                $mail->CharSet = 'UTF-8';
                $mail->Subject = 'Réintialisation de votre mot de passe';
                $mail->Body = "Vous avez oubliez votre mot de passe ?. Pas de Soucis ! Ca m'arrive tout les jours.. Votre code de réintialisation de mot de passe est: $code  
                Rendez vous la semaine prochaine ;)";
                $mail->AltBody = 'This is the body in plain for non-HTML mail clients';
                if ($mail->send()) {
                    $_SESSION['email'] = $email;
                    header("Location: ../views/codeVerif.php");
                    exit;
                } else {
                    header('Location: ../../index.php?erreur= email_non_envoye');
                    exit;
                }
            } catch (Exception $e) {
                echo "Le mail ne peut pas etre envoyé. MAIL ERROR: {$mail ->ErrorInfo}";
            }
        } else {
            header('Location: ../../index.php?erreur=wap_bd_error');
            exit;
        }
    }

    public function changeMotDePasse($newPassword, $confirmPassword, $email){
        if ($newPassword == $confirmPassword) {
            $hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);
            $query = "UPDATE users SET password =:newPassword WHERE email = email";
            $stmt = $this->connectwap_bd()->prepare($query);
            $stmt -> bindParam('newMDP', $hashed_password, PDO::PARAM_STR);
            $stmt -> bindParam('email', $email, PDO::PARAM_STR);

        }
    }
}
?>
