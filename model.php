<?php
class UserModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getUserByEmailAndPassword($email, $password)
    {
        try {
            // Prepare the SQL query with placeholders
            $query = "SELECT * FROM users WHERE email = ? AND password = ?";
            $stmt = $this->conn->prepare($query);

            // Bind the parameters
            $stmt->bind_param('ss', $email, $password);

            // Execute the query
            $stmt->execute();

            // Get the result as an associative array
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            return $user;
        } catch (Exception $e) {
            // Handle exceptions here
            echo "Erreur : " . $e->getMessage();
            return null;
        }
    }
}
?>
