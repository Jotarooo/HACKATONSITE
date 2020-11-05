<?php 
    require('utils.php');

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $exigence = $_POST['exigence'];
    $connex = GetConnection();

    $servername = "remotemysql.com";
    $username = "qgO0M364Or";
    $dbname = "qgO0M364Or";
    $password = "7Hyomgetg3";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
        header('Location: index.php');
      }           
  
      catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }  
  


    $sql = "INSERT INTO Devis (nom, prenom, email, exigence) VALUES ('$nom','$prenom','$email','$exigence')";
    $conn->query($sql);

    ?>
