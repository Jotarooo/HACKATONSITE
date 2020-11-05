<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Code CAMP Marquises</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>   

<div id="connexion" class="container">
  <div class="row">
    <div class="col-6 ">
    
      <form action="traiterformulaire.php" method="post">

        <div><h1>Devis</h1></div>

        <div class="form-group">
          <label for="nom_client">Nom</label>
          <input required name="nom" id="nom" class="form-control" placeholder="Veuillez entrer votre Nom">
        </div>

        <div class="form-group">
          <label for="prenom_client">Prenom</label>
          <input required id="prenom" name="prenom" class="form-control" placeholder="Veuillez entrer votre prenom">
        </div>
       
        <div class="form-group">
          <label for="email_client">Email</label>
          <input required id="email" type="email" name="email" class="form-control" placeholder="Veuillez entrer votre adresse mail">
        </div>

        <div class="form-group">
          <label for="exigeance_client">Exigeance</label>
          <input required id="exigeance" name="exigeance" class="form-control" placeholder="Veuillez entrer votre adresse mail">
        </div>
        <button type="submit" class="btn btn-primary">Envoyer le devis</button>    

      </form>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
