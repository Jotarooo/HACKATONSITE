<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Marquise Wedding</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">
  </head>

  <body>

          <?php
              include('utils.php');

// // Connexion et s�lection de la base
// $mysqli = new mysqli('remotemysql.com', 'qgO0M364Or', '7Hyomgetg3','qgO0M364Or');
// /* V�rifie la connexion */
// if (mysqli_connect_errno()) {
//     printf("�chec de la connexion : %s\n", mysqli_connect_error());
//     exit();
// }

$mysqli = GetConnection();

// Ex�cution des requ�tes SQL
$query = "SELECT nom, url, description FROM Prestataire";
if ($stmt = $mysqli->prepare($query)) {

    /* Ex�cution de la requ�te */
    $stmt->execute();

    /* Association des variables de r�sultat */
    $stmt->bind_result($nom, $url, $description);

    /* Lecture des valeurs */
    while ($stmt->fetch()) {
       
    }

    /* Fermeture de la commande */
    $stmt->close();
}
/* Fermeture de la connexion */
$mysqli->close();
?>

<?php master_header();?>

<a class="btn btn-primary" href="nosprestataire.php">Tout les prestataires</a>

<?php master_footer();?>

 

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
    $('.presta-checkbox ').change(function() {
      console.log('check' + this.id);
    });
  });
  </script>
</body>
</html>