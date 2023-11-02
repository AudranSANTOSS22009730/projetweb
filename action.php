<?php

include "config.php";

if(isset($_GET['t'],$_GET['id']) AND !empty($_GET['t']) AND !empty($_GET['id'])) {
    $getid = (int) $_GET['id'];
    $gett = (int) $_GET['t'];
    $sessionid = 5;
    $check = $conn->prepare('SELECT id FROM articles WHERE id = ?');
    $check->execute(array($getid));
    if($check->rowCount() == 1) {
        if($gett == 1) {
            $check_like = $conn->prepare('SELECT id FROM likes WHERE id_article = ? AND id_membre = ?');
            $check_like->execute(array($getid,$sessionid));
            $del = $conn->prepare('DELETE FROM dislikes WHERE id_article = ? AND id_membre = ?');
            $del->execute(array($getid,$sessionid));
            if($check_like->rowCount() == 1) {
                $del = $conn->prepare('DELETE FROM likes WHERE id_article = ? AND id_membre = ?');
                $del->execute(array($getid,$sessionid));
            } else {
                $ins = $conn->prepare('INSERT INTO likes (id_article, id_membre) VALUES (?, ?)');
                $ins->execute(array($getid, $sessionid));
            }

        } elseif($gett == 2) {
            $check_like = $conn->prepare('SELECT id FROM dislikes WHERE id_article = ? AND id_membre = ?');
            $check_like->execute(array($getid,$sessionid));
            $del = $conn->prepare('DELETE FROM likes WHERE id_article = ? AND id_membre = ?');
            $del->execute(array($getid,$sessionid));
            if($check_like->rowCount() == 1) {
                $del = $conn->prepare('DELETE FROM dislikes WHERE id_article = ? AND id_membre = ?');
                $del->execute(array($getid,$sessionid));
            } else {
                $ins = $conn->prepare('INSERT INTO dislikes (id_article, id_membre) VALUES (?, ?)');
                $ins->execute(array($getid, $sessionid));
            }
        }
        header('Location: article.php?id='.$getid);
    } else {
        exit('Erreur fatale. <a href="modules/blog/views/acceuil_view.php">Revenir à l\'accueil</a>');
    }
} else {
    exit('Erreur fatale. <a href="modules/blog/views/acceuil_view.php">Revenir à l\'accueil</a>');
}
