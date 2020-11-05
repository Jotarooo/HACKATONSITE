<?php 
    require('utils.php');

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $exigence = $_POST['exigence'];
    $numero = $_POST['numero'];
    $connex = GetConnection();

    $servername = "remotemysql.com";
    $username = "qgO0M364Or";
    $dbname = "qgO0M364Or";
    $password = "7Hyomgetg3";

    $prestaIds = $_POST['presta'];
    var_dump($prestaIds);

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
      }           
  
      catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }  
  


    $sql = "INSERT INTO Devis (nom, prenom, email,date, exigence, numero) VALUES ('$nom','$prenom','$email','$date','$exigence', '$numero')";


    $conn->query($sql);
    $devisId = $conn->insert_id;
    $sql = "";


    ?>
