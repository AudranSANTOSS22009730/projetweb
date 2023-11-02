<?php
require_once 'config.php';

class UserModel {
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
}
?>
