<?php
require_once 'config.php';

class Users {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function isUserExists($email) {
        $email = strtolower($email);
        $check = $this->conn->prepare('SELECT email FROM users WHERE email = ?');
        $check->bind_param('s', $email);
        $check->execute();
        $result = $check->get_result();
        return $result->num_rows > 0;
    }

    public function addUser($pseudo, $email, $age, $genre, $password, $ip, $token) {
        $email = strtolower($email);
        $insert = $this->conn->prepare('INSERT INTO users(pseudo, email, age, genre, password, ip, token) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $insert->bind_param('sssssss', $pseudo, $email, $age, $genre, $password, $ip, $token);
        return $insert->execute();
    }

    public function getUserByEmailAndPassword($email, $password) {
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($this->conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            return mysqli_fetch_assoc($result);
        } else {
            return null;
        }
    }

    public function register(){
        // Code pour l'enregistrement
    }

}

class PublicationModel {
    public function getPublications() {
        // Code pour récupérer les publications depuis la base de données
        return [
            ['id' => 1, 'auteur' => 'Utilisateur 1', 'contenu' => 'Première publication'],
            ['id' => 2, 'auteur' => 'Utilisateur 2', 'contenu' => 'Deuxième publication'],
            ['id' => 3, 'auteur' => 'Utilisateur 3', 'contenu' => 'Troisième publication'],
        ];
    }
}
?>
