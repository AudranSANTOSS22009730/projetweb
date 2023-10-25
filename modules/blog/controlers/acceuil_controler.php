<?php
require_once('modules/blog/models/acceuil_models.php');

class AccueilController {

    private $publicationModel;

    public function __construct() {
        $this->publicationModel = new PublicationModel();
    }

    public function index() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_publication'])) {
            $auteur = $_POST['auteur']; // Ici, utilisez votre mécanisme d'authentification pour obtenir l'auteur actuel
            $contenu = $_POST['contenu'];

            $this->publicationModel->addPublication($auteur, $contenu);
        }

        $publications = $this->publicationModel->getPublications();
        include('modules/blog/views/acceuil_view.php');
    }
}

$controller = new AccueilController();
$controller->index();
