<?php
include('modules/blog/models/acceuil_models.php');
$publicationModel = new PublicationModel();
$publications = $publicationModel->getPublications();
