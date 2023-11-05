public function addPublication($auteur, $contenu) {
// Connexion à la base de données (à personnaliser)
$dbh = new PDO('mysql:host=your_host;dbname=your_dbname', 'your_username', 'your_password');

// Préparation de la requête
$stmt = $dbh->prepare("INSERT INTO publications (auteur, contenu) VALUES (:auteur, :contenu)");
$stmt->bindParam(':auteur', $auteur);
$stmt->bindParam(':contenu', $contenu);

// Exécution de la requête
$stmt->execute();
}
