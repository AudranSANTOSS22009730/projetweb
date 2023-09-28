<?php
global $conn;
session_start(); // Démarrage de la session
require_once 'config.php'; // On inclut la connexion à la base de données

if(!empty($_POST['email']) && !empty($_POST['password'])) // Si il existe les champs email, password et qu'il sont pas vident
{

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Patch XSS
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if(empty($email)){
        header("Location: index.php?error=User Name is required");
        exit();
    }else if(empty($password)){
        header("Location: index.php?error= Password is required");
        exit();
    }else{
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)== 1){
            $row = mysqli_fetch_assoc($result);
            if($row['email'] === $email && $row['password'] === $password){
                header("Location: accueil.php");
                exit();
            }else{
                header("Location: index: index.php?error=Incorrect User name or password");
                exit(

                );
            }
        }else{

            header("Location: index: index.php?error=Incorrect User name or password");
            exit();
        }

    }



}else{
    header("Location: index.php");
    exit();
}

/*

$email = strtolower($email); // email transformé en minuscule


// On regarde si l'utilisateur est inscrit dans la table utilisateurs
$check = $conn->prepare('SELECT pseudo, password, email FROM users  WHERE email = ?');
$check->execute(array($email));
$data = $check->fetch();
$row = $check->num_rows;



// Si > à 0 alors l'utilisateur existe
if($row > 0)
{
    // Si le mail est bon niveau format
    if(filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        // Si le mot de passe est le bon
        if(password_verify($password, $data['password']))
        {
            // On créer la session et on redirige sur landing.php
            $_SESSION['user'] = $data['token'];
            header('Location: landing.php');
            die();
        }else{ header('Location: index.php?login_err=password'); die(); }
    }else{ header('Location: index.php?login_err=email'); die(); }
}else{ header('Location: index.php?login_err=already'); die(); }
}else{ header('Location: index.php'); die();} // si le formulaire est envoyé sans aucune données

*/