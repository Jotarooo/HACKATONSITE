<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>MW formulaire</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="/form.css">
  
</head>
<body> 
<?php require ('utils.php');?>  

<div id="connexion" class="container">
  <div class="row">
    <div class="col-12 ">
    

      <form id="msform" action="traiterformulaire.php" method="post">

        <ul id="progressbar" >
          <li class="active">Choix des prestataires</li>
          <li>Information clients</li>
        </ul>

        <fieldset>

          <h2 class="fs-title">Prestataires</h2>

          <?php multi_cards_prestataire();?>



          <input type="button" name="next" class="next action-button" value="Next"/>

        </fieldset>


        <fieldset class="fs-title">
          <h2>Informations clients</h2>
             <div><h1>Devis</h1></div>

        <div class="form-group">
          <label for="nom_client">Nom</label>
          <input required id="nom_client" name="nom"  class="form-control" placeholder="Veuillez entrer votre Nom">
        </div>

        <div class="form-group">
          <label for="prenom_client">Prenom</label>
          <input required id="prenom_client" name="prenom" class="form-control" placeholder="Veuillez entrer votre prenom">
        </div>
       
        <div class="form-group">
          <label for="email_client">Email</label>
          <input required id="email_client" type="email" name="email" class="form-control" placeholder="Veuillez entrer votre adresse mail">
        </div>

        <div class="form-group">
          <label for="exigeance_client">Exigeance</label>
          <input required id="exigeance_client" name="exigence" class="form-control" placeholder="Veuillez entrer votre adresse mail">
        </div>

        <div class="form-group">
          <label for="numero_client">Numero</label>
          <input required id="numero_client" name="numero" class="form-control" placeholder="Numero de telephone">
        </div>

        <div class="form-group">
          <label for="date_client">Date</label>
          <input required id="date_client" name="date" type="date" class="form-control" placeholder="Date">
        </div>
        <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
        <button type="submit" class="btn btn-primary">Envoyer le devis</button>    
        </fieldset>
      </form>
    </div>
  </div>
</div>


<script src="http://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="form.js"></script>
</body>
</html>
