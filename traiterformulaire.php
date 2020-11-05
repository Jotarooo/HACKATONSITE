<?php 
    require('utils.php');

  $nom = $_POST['nom'];
   $prenom = $_POST['prenom'];
   $email = $_POST['email'];
   $date = $_POST['date'];
   $exigence = $_POST['exigence'];
   $numero = $_POST['numero'];
   $prestaIds = $_POST['presta'];

    $mysqli = GetConnection();

    $servername = "remotemysql.com";
    $username = "qgO0M364Or";
    $dbname = "qgO0M364Or";
    $password = "7Hyomgetg3";

    $sql = "INSERT INTO Devis (nom, prenom, email,date, exigence, numero) VALUES ('$nom','$prenom','$email','$date','$exigence', '$numero')";

    $mysqli->query($sql);
    $devisId = $mysqli->insert_id;

    $sql = "";
    foreach($prestaIds as $pid){
      $sql .= "INSERT INTO DevisPrestataire (devisid,prestataireid) VALUES ($devisId,$pid);";
    }

    $mysqli->multi_query($sql);
    if($mysqli == true){
      header()
    }
    
    $mysqli->close();

    ?>
