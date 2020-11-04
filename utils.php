<?php

function GetConnection() {
    // Connexion et sélection de la base
    $mysqli = new mysqli('remotemysql.com', 'qgO0M364Or', '7Hyomgetg3','qgO0M364Or');
    /* Vérifie la connexion */
    if (mysqli_connect_errno()) {
        printf("Échec de la connexion : %s\n", mysqli_connect_error());
        exit();
    }

    return $mysqli;
}

function GetAllPrestataire() {
    $mysqli = GetConnection();
    $query = "SELECT nom, url, description FROM Prestataire";

    if ($stmt = $mysqli->prepare($query)) {

        /* Exécution de la requête */
        $stmt->execute();
    
        /* Association des variables de résultat */
        $stmt->bind_result($nom, $url, $description);
    }
    
    return $stmt-> fetch_array();
}

function master_header(){

  printf( '<div class="container header pt-3">
  <div class="row"> 
      <div class = "h1 col- ">Logo</div>  

      <div class="h1 col-11 text-center">
          <p>Markiz Wedding</p>
      </div>
  </div>
</div>');

}



function master_footer(){
  printf('<div class="footer container mt-5 py-5">
  <div class="row">
    <div class="h1 col-6 ">Footer</div>
  </div>
</div>
  ');
}

function buttonss(){
  printf('
  <div class="container">
    <div class="row"><div class="col-3"><a class="btn btn-primary" href="#" role="button">Retour a lacceuil</a></div>
      <div class="col-3"><button type="submit" class="btn btn-primary">Valider ses choix</button></div>
      <div class="col-3"><a class="btn btn-primary" href="#" role="button">Ajouter un prestataire</a></div>
      <div class="col-3"><a class="btn btn-primary" href="#" role="button">Quitter</a></div>
       </div>
    </div>
');
}

function multi_cards_prestataire(){

  $mysqli = GetConnection();

  // Exécution des requêtes SQL
  $query = "SELECT nom, description,categorie FROM Prestataire";
  if ($stmt = $mysqli->prepare($query)) {
  
      /* Exécution de la requête */
      $stmt->execute();
  
      /* Association des variables de résultat */
      $stmt->bind_result($nom, $description, $categorie );
  
      /* Lecture des valeurs */
      while ($stmt->fetch()) {
        printf('<div class="card text-center container my-5" style="width: auto">

        <div class="row">
        <div class="card-body">
            <h5 class="card-title text-left">'.$categorie.'</h5>
        </div>
  
        <div class="dropdown m-3">
          <button type="button" class="btn btn-primary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
            Vos choix
          </button>
          <div class="dropdown-menu pb-0 " aria-labelledby="dropdownMenuOffset">
            <p class="dropdown-item text-primary disabled ">$checked</p>

          </div>
        </div>
          
        <div class="dropdown m-3">
          <button  type="button" class="btn btn-primary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
            Prestataires
          </button>
          <div class="dropdown-menu pl-4" aria-labelledby="dropdownMenuOffset">
            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label  dropdown-toggle" id="dropdowndesc" aria-haspopup="true" aria-expanded="false" data-offset="10,20" data-toggle="dropdown" for="defaultCheck1">
               '.$nom.'
              </label>
              <div class="dropdown-menu" style="width=30px" >
                  <p class="dropdown-item" aria-labelledby="dropdowndesc">'.$description.'</p>
              </div>
          </div>
        </div>
      
        </div>
        
      </div>
        ');      
      }
  
      /* Fermeture de la commande */
      $stmt->close();
  }
  /* Fermeture de la connexion */
  $mysqli->close();
  
}

?>