<?php
class UserModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getUserByEmailAndPassword($email, $password) {
        try {
            // Préparez la requête SQL en utilisant des paramètres nommés pour la sécurité
            $query = "SELECT * FROM users WHERE email = :email AND password = :password";
            $stmt = $this->conn->prepare($query);

            // Liez les valeurs aux paramètres nommés
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);

            // Exécutez la requête
            $stmt->execute();

            // Récupérez le résultat sous forme de tableau associatif
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            return $user;
        } catch (PDOException $e) {
            // Gérez les erreurs PDO ici
            echo "Erreur PDO : " . $e->getMessage();
            return null;
        }
    }
}
?>
