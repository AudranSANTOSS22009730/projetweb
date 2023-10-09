<?php
class publicationModel {
    public function getPublications()
    {
        return [
            ['id' => 1, 'auteur' => 'Utilisateur 1', 'contenu' => 'Première publication'],
            ['id' => 2, 'auteur' => 'Utilisateur 2', 'contenu' => 'Deuxième publication'],
            ['id' => 3, 'auteur' => 'Utilisateur 3', 'contenu' => 'Troisième publication'],
        ];

    }
}
?>