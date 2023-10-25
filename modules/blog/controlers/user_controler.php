<?php

use models\Users;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class UserController {
    public function Inscription() {
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST") {
            // Récupérez les données du formulaire
            $email = $_POST["email"];
            $password = $_POST["mot_de_passe"];
            $pseudo = $_POST["pseudo"];

            $Users = new Users();
            $Users->createUser($email, $pseudo, $password);
        }
    }

    public function Connexion() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['mot_de_passe'];

            // Appelez le modèle pour vérifier les informations de connexion
            $Users = new UserModel();
            $Users->checkLogin($email, $password);
        }
    }

    public function MotDePasseOublie() {
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer l'adresse e-mail soumise par l'utilisateur
            $email = $_POST["email"];

            $Users = new UserModel();
            $Users->ChangerMotDePasse($email);
        }
    }

    public function VerificationCode() {
        if (
            isset($_SERVER['REQUEST_METHOD']) &&
            $_SERVER["REQUEST_METHOD"] == "POST"
        ) {

            session_start();

            $code = $_POST["code"];
            $email = $_SESSION["email"];

            $Users = new UserModel();
            $Users->resetMotDePasse($email, $code);
        }
    }

    public function ChangeMotDePasse() {
        if (
            isset($_SERVER['REQUEST_METHOD']) &&
            $_SERVER["REQUEST_METHOD"] == "POST"
        ) {

            session_start();

            $newMDP = $_POST["newMDP"];
            $confirmNewMDP = $_POST["confirmNewMDP"];
            $email = $_SESSION["email"];

            $userModel = new UserModel();
            $userModel->ChangeMotDePasse($newMDP, $confirmNewMDP, $email);
        }
    }
}
?>
