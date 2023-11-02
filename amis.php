<?php
    session_start();
    require 'config.php';

    $query = $conn->prepare("SELECT * FROM friends WHERE pseudo_1 = :pseudo_1 OR pseudo_2 = :pseudo_2");

    $query->execute([
        "pseudo_1" => $_SESSION['pseudo'],
        "pseudo_2" => $_SESSION['pseudo']
    ]);

    $data  = $query->fetchAll();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Amis</title>
    <meta charset="utf-8">
</head>
<body>
<div class="container">
<h1> Bienvenue <?php echo $_SESSION['pseudo']?></h1>

<h2> Liste d'amis :</h2>

<?php

    for ($i=0; $i < sizeof($data); $i++){

        if($data[$i]['pseudo_1'] == $_SESSION['pseudo']){

            echo$data[$i]['pseudo_2'];

            if( $data[$i]['is_pending'] == true)
                echo " (en attente d'être accepté)";
        }else{

            if( $data[$i]['is_pending'] == false){
                echo $data[$i]['pseudo_1'];
            }
        }
        echo'<br/>';
    }

?>

<h2>Demande d'amis :</h2>

<?php

    for ($i=0; $i < sizeof($data); $i++){
        if($data[$i]["is_pending"] == true && $data[$i]['pseudo_2'] == $_SESSION['pseudo']){
            echo $data[$i]['pseudo_1']. " <a href='#'>Accepté</a>";


        }
    }
?>

<h2>Autres utilisateurs :</h2>

</div>
</body>
</html>

