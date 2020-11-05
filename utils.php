<?php

function GetConnection() {
    // Connexion et s�lection de la base
    $mysqli = new mysqli('remotemysql.com', 'qgO0M364Or', '7Hyomgetg3','qgO0M364Or');
    /* V�rifie la connexion */
    if (mysqli_connect_errno()) {
        printf("�chec de la connexion : %s\n", mysqli_connect_error());
        exit();
    }

    return $mysqli;
}

function GetAllPrestataire() {
    $mysqli = GetConnection();
    $query = "SELECT nom, url, description FROM Prestataire";

    if ($stmt = $mysqli->prepare($query)) {

        /* Ex�cution de la requ�te */
        $stmt->execute();
    
        /* Association des variables de r�sultat */
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
  printf('
  <div class="container">
    <div class="row"><div class="col-3">
      <a class="btn btn-primary" href="index.php" role="button">Retour a lacceuil</a></div>
      <div class="col-2"><button type="submit" class="btn btn-primary">Valider ses choix</button></div>
      <div class="col-2"><a class="btn btn-primary" href="#" role="button">Ajouter un prestataire</a></div>
      <div class="col-2"><a class="btn btn-primary" href="#" role="button">Exigeance</a></div>
      <a href="formulaire.php" class="button">faire un formulaire</a>

      </div>
    </div>
');
  printf('<div class="footer container mt-5 py-5">
  <div class="row">
    <div class="h1 col-6 ">Footer</div>
  </div>
</div>
  ');
}


function multi_cards_prestataire(){
  $mysqli = GetConnection();
  
  // Ex?cution des requ?tes SQL
  $query = "SELECT id, nom, description, categorie FROM Prestataire";
  if ($stmt = $mysqli->prepare($query)) {
  
      /* Ex?cution de la requ?te */
      $stmt->execute();
  
      /* Association des variables de r?sultat */
      //$stmt->bind_result($id, $nom, $description, $categorie );
      $colId=0;
      $colNom=1;
      $colDescription=2;
      $colCategorie=3;
  
      $results = $stmt->get_result();
      $prestas = $results->fetch_all();
      $categories;
      foreach($prestas as $p){
        $categories[] = $p[$colCategorie];
      }
  
      $categories = array_unique($categories);
      /* Lecture des valeurs */
      foreach($categories as $categorie) {
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
          <div class="dropdown-menu pl-4" aria-labelledby="dropdownMenuOffset">');
  
            /* pour chaque cat�gorie, afficher le prestataire */
           foreach($prestas as $p) {
              if($p[$colCategorie] == $categorie) {
        printf('
                
                <div class="dropdown-item">
            <input class="form-check-input presta-checkbox" type="checkbox"  name="presta[]" id="presta" value="'.$p[$colId].'">
              <label class="form-check-label  dropdown-toggle" id="dropdowndesc" aria-haspopup="true" aria-expanded="false" data-offset="10,20" data-toggle="dropdown" for="check-presta-'.$p[$colId].'">
               '.$p[$colNom].'
              </label>
              
              <div class="dropdown-menu" style="width=30px" >
                  <p class="dropdown-item" aria-labelledby="dropdowndesc">'.$p[$colDescription].'</p>
              </div>
              </div>
          
          ');
            }
          }
            printf('
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
  


