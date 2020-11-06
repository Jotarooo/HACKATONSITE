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


















//navbar
function navBarCustom(){
  print('
      <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                    <span class="sr-only">(current)</span>
                  </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>');
}


//header. touchable
function master_header(){

  printf( '
  <div id="hautDePage" class="container h1 masthead header pt-3">
    <div class="row"> 

      <div class = "h1 col-3">Logo</div>  

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

      <a href="#hautDePage" class="btn ">Haut de page</a>

      </div>
    </div>

  ');

}


//footer
function master_footer(){
  printf('
  <section class="py-5">
    <div class="container">
      <footer class="pt-4 my-md-5 pt-md-5 border-top">

        <div class="row">
          <div class="col-3"><a class="btn btn-primary" href="index.php" role="button">Retour a lacceuil</a></div> 
          <div class="col-3 col-md">
            <img class="mb-2" src="img/logo.png" alt="logo" width="24" height="24">
            <small class="d-block mb-3 text-muted">&copy; 2020</small>
          </div>
          <div class="col-3 col-md">
            <h5>Retrouvez nous!</h5>
            <ul class="list-unstyled text-small">
              <li><p class="text-black">Marquise Wedding</p></li>
              <li><p class="text-black">87.26.35.42</p></li>
              <li><p class="text-black">Taiohae Nuku-Hiva</p></li>
              <li><a class="text-info" href="#">marquizwedd@mail.com</a></li>
            </ul>
          </div> 
          <div class="col-3 col-md">
            <h5>Suivez nous!</h5>
            <ul class="list-unstyled text-small ">
              <li><a class="text-info text-decoration-none" href="#">Notre page facebook</a></li>
              <li><a class="text-info text-decoration-none" href="#">Notre Instagram</a></li>
            </ul>
          </div>

      
        </div>
      </footer>
    </div>
  </section>
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


function contentMain(){
  print('
  <section class="py-5">
  <div class="album py-5 bg-light">
      <div class="container">
  
        <div class="row">

          <!--case Mariage-->
          
          <div class="col-md-5" >
            <div class="card mb-4 shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"> <rect width="100%" height="100%" fill="#17a2b8"/><text x="50%" y="50%" fill="#eceeef">unnamed.png</text></svg>
              <div class="card-body">
                <p class="card-text">Découvrez le mariage traditionel.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-info">Organiser votre mariage</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-2"></div>

          <!--case lune de miel-->
          <div class="col-md-5" >
            <div class="card mb-4 shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"> <rect width="100%" height="100%" fill="#ffc107"/><text x="50%" y="50%" fill="#eceeef">unnamed.png</text></svg>
              <div class="card-body">
                <p class="card-text">Découvrez le mariage traditionel.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-warning">Organiser votre mariage</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          

          <!--case soirée-->
          <div class="col-md-5" >
            <div class="card mb-4 shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"> <rect width="100%" height="100%" fill="#dc3545"/><text x="50%" y="50%" fill="#eceeef">unnamed.png</text></svg>
              <div class="card-body">
                <p class="card-text">Découvrez le mariage traditionel.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-danger">Organiser votre mariage</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          
          <div class="col-md-2"></div>


          <!--case soirée-->
          <div class="col-md-5" >
            <div class="card mb-4 shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"> <rect width="100%" height="100%" fill="#28a745"/><text x="50%" y="50%" fill="#eceeef">unnamed.png</text></svg>
              <div class="card-body">
                <p class="card-text">Découvrez le mariage traditionel.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-success">Organiser votre mariage</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
');
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
  


