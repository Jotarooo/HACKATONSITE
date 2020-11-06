<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="ISO 8859-1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
</body>
</html>






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
//fin du pas touche.


















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
  <header class="headerHeader" >
  <div class="containerh-fluid" id=hautDepage>
    <div class="row h-100 align-items-center">
      <div class="col-3">
        <img class="logo" src="img/logo.png" alt="logo">
      </div>
        <div class="col-9">
          <div class="titreNom titre">
            Marquises Wedding
          </div>
        </div>
          <div class="sloganNom slogan">
            Vivez Vos RÃªves aux Marquises
          </div>
    </div>
  </div>
</header>');

}


function boutonsOrganiserVotreMariage(){
  printf("
    <div class='container my-6'>
      <div class='row'>

        <div class=' col-4'>
        <a href='index.php' class='btn btn-info '>Retour à l'acceuil</a>
        </div>

        <div class='col-4'>
        <a href='formulaire.php' class='btn btn-info'>Ajouter une prestation</a>
        </div>

        <div class=' col-4'>
        <a href='nosprestataire.php' class='btn btn-info'>Consulter la liste des prestataires</a>
        </div>

      </div>
    </div>

  ");
}



function boutonsPresta(){
  printf("
    <div class='container'>
      <div class='row '>

        <div class=' col-4'>
        <a href='#hautDePage' class='btn btn-info '>Haut de page</a>
        </div>

        <div class='col-4'>
        <a href='formulaire.php' class='btn btn-info'>Faire appel à des prestataires</a>
        </div>

        <div class=' col-4'>
        <a href='index.php' class='btn btn-info'>Retour à l'acceuil</a>
        </div>

      </div>
    </div>

  ");
}

function boutonsAcceuil(){
  printf("
    <div class='container'>
      <div class='row'>

        <div class='col-6 '>
        <a href='#' class='btn btn-success btn-lg'>S'inscrire</a>
        </div>

        <div class='col-6'>
        <a href='#' class='btn btn-success btn-lg'>Bienvenue sur notre site!</a>
        </div>
        
      </div>
      
    </div>

  ");
}


//footer
function master_footer(){
  printf('
  <div class="containerf-fluid ">
  <footer>
      <div class="row align-items-top">
        <div class="col-1">

        </div>
        <div class="col-3 col-md">
        <div class="titreFooter1col">
          Marquises Wedding
        </div>
        </div>
        <div class="col-3">
        <div class="titreFooter2col">
          <div class="petitpetittransparent">
            kfkfkfkfk
          </div>
          <div class="centrerText">
          Retrouvez nous
          </div>
        </div>
        <div class="centrerText2">
            <strong> Marquises Wedding <br></strong>
            <strong>87.26.35.62 <br></strong>
            <strong>Taiohae Nuku-Hiva <br></strong>
            <strong>MarkizWedd@gmail.com <br><br></strong>
        </div>
        
      </div>
      <div class="col-3">
        <div class="titreFooter3col">
          <div class="petitpetittransparent">
            kfkfkfkfk
          </div>
          <div class="centrerText">
          Suivez nous sur
          </div>
        </div>
        <div class="centrerText">
        <a href="https://www.facebook.com" title="facebook">
          <img src="/img/facebookpng.jpg" alt="facebook">
        </a>
        <a href="https://www.instagram.com/?hl=fr" title="facebook">
          <img src="/img/instagram.png" alt="instagram">
        </a>
        </div>
        </div>
        <div class="col-1">

        </div>
      </div>
  </footer>
</div>
');
}


//fin des codes touchables













































































//pas touche ici!

function multi_cards_prestataire(){
  $mysqli = GetConnection();
  
  // Ex?cution des requ?tes SQL
  $query = "SELECT id, nom,categorie FROM Prestataire";
  if ($stmt = $mysqli->prepare($query)) {
  
      /* Ex?cution de la requ?te */
      $stmt->execute();
  
      /* Association des variables de r?sultat */
      //$stmt->bind_result($id, $nom, $description, $categorie );
      $colId=0;
      $colNom=1;
      $colCategorie=2;
  
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

                  <label class="btn form-check-label" for="check-presta-'.$p[$colId].'">
                    '.$p[$colNom].'
                  </label>  
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
  


