<?php
  function getConnexionDatabase() {
    //Connexion BDD
    $servername = "SG-mccrecette-3341-master.servers.mongodirector.com";
    $username = "sgroot";
    $dbname = "hackathonbase";
    $password = "8i0nkEAyMxA-9xUm";

    try {
      $connexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch(PDOException $e) {
      print "Connection failed: " . $e->getMessage();
    }

    return $connexion;
  }


  function getNom{
    $connexion = getConnexionDatabase();

    $sql ='SELECT * FROM hackatonbase WHERE nom'

    $query = $connexion->prepare($sql);
    $query->execute();

    $result = $query->setFetchMode(PDO::FETCH_ASSOC);

    return $query->fe
    

  }
?>
