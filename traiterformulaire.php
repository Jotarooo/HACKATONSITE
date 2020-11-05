<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="ISO 8859-1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>connexion</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">




</head>
<body>
  
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
      alertdevis();
    }
    else{
      print "error connexion";
    }
    
    $mysqli->close();

    ?>
  <script src="http://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="form.js"></script>
</body>
</html>








