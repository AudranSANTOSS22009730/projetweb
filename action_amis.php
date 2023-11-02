<?php
session_start();
require "config.php";

if ($_GET['action'] == "delete") {

    $conn->query("DELETE FROM friends WHERE id =".$_GET['id']);
    header('Location: amis.php');

}

if($_GET['action'] == "add"){
    $query = $conn->prepare("INSERT INTO friends(pseudo_1, pseudo_2, is_pending) VALUES (:pseudo_1, :pseudo_2, :is_pending)");

    $query->execute([

        "pseudo_1" => $_SESSION['pseudo'],
        "pseudo_2" => $_GET['pseudo'],
        "is_pending" => 1
    ]);
    header('Location: amis.php');
}
if($_GET['action'] == "accept"){

    $conn->query("UPDATE friends SET is_pending = 0 WHERE id =".$_GET['id']);

    header('Location: amis.php');

}

?>