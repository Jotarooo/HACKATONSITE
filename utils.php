<?php


//debut pas touche!!
function GetConnection() {
    $mysqli = new mysqli('remotemysql.com', 'qgO0M364Or', '7Hyomgetg3','qgO0M364Or');
    if (mysqli_connect_errno()) {
        printf("ï¿½chec de la connexion : %s\n", mysqli_connect_error());
        exit();
    }

    return $mysqli;
}
function GetAllPrestataire() {
    $mysqli = GetConnection();
    $query = "SELECT nom, url, description FROM Prestataire";

    if ($stmt = $mysqli->prepare($query)) {

        $stmt->execute();
    
        $stmt->bind_result($nom, $url, $description);
    }
    
    return $stmt-> fetch_array();
}
//fin du pastouche.




//header. touchable
function master_header(){

  printf( '<div id="hautDePage" class="container h1 masthead header pt-3">
  <div class="row"> 
      <div class = "h1 col- ">Logo</div>  

      <div class="titrePrincipal col-11 text-center">
          <p> Markiz Wedding </p>
      </div>
  </div>
</div>');

}

//quand le devis est fini
function alertdevis(){
  printf('
  <div class="alert alert-success" styles="width=150px; height=100px" role="alert">
    <h4 class="alert-heading">Votre devis à bien été enregistré</h4>
    <p>Vous recevrez le devis dans quelques jours.Vérifiez votre boîte mail ;)</p>
    <hr>
    <p class="mb-0">Bonne journée.</p>
    <a class="btn btn-info" href="nosprestataire.php">Aller voir la page des prestataires</a>
    <a class="btn btn-info" href="index.php">Acceuil</a>

  </div>
  ');
}

function boutonsRepetitif(){
  printf('
    <div class="container">
      <div class="row col-3">

      <a class="btn btn-primary" href="index.php" role="button">Retour a lacceuil</a>
      <a href="#hautDePage" class="btn ">Haut de page</a>

      </div>
    </div>

  ');

  }


//footer
function master_footer(){
  printf('
  <div class="container masterfooter">
    <div class="row ">
      <div class="col-3">
        <a href="formulaire.php" class="btn btn-primary">Faire un formulaire</a>
      </div>
    </div>
');
  printf('
    <div class="footer container mt-5 py-5">
      <div class="row">
        <div class="h1 col-6 ">Footer</div>
      </div>
    </div>
  </div>
  ');
}


//fin des codes touchables
















//pas touche ici!

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
          <button  type="button" class="btn btn-primary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
            Prestataires
          </button>
        <div class="dropdown-menu pl-4" aria-labelledby="dropdownMenuOffset">');
  
            /* pour chaque catï¿½gorie, afficher le prestataire */
           foreach($prestas as $p) {
              if($p[$colCategorie] == $categorie) {
        printf('
                
                <div class="dropdown-item">
              <input class="form-check-input presta-checkbox" type="checkbox"  name="presta[]" id="presta" value="'.$p[$colId].'">
              <label class="btn form-check-label "  aria-haspopup="true" aria-expanded="false" data-offset="10,20"  for="check-presta-'.$p[$colId].'">
               '.$p[$colNom].'
              </label>  
              
              <div class="collapse" id="descript">
                  <div class="card card-body">  aria-labelledby="dropdowndesc">'.$p[$colDescription].'</div>
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
  



function multi_prestataire(){
  $mysqli = GetConnection();
  
  $query = "SELECT id, nom, description, categorie FROM Prestataire";
  if ($stmt = $mysqli->prepare($query)) {
  
      $stmt->execute();
  
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
      foreach($categories as $categorie) {
        printf('
        <div class="card text-center container my-5" style="width: auto">
          <div class="row">

            <div class="card-body">
              <h5 class="card-title text-left">'.$categorie.'</h5>
            </div>
        
            
            <button  type="button" class="btn btn-primary" data-toggle="collapse" href="#descript-'.$categorie.'" role="button" aria-expanded="false" aria-controls="descript">
              Prestataires </button>
              <div class="collapse" id="descript-'.$categorie.'" >
            ');
  
                foreach($prestas as $p) 
                {
                if($p[$colCategorie] == $categorie) {
                  printf('   
                  <div class="card card-body"><div class="text-primary">'.$p[$colNom].':</div> '. $p[$colDescription].'</div>
          ');
            }
          }
            printf('
            </div>
        </div>
      </div>
        ');      
      }
  
      $stmt->close();
  }
  $mysqli->close();
  
}
  


