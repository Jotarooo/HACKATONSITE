<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Rum+Raisin" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
  <title>Marquises Wedding</title>
</head>
<body>
    <?php require('utils.php')?>
 
  <!-- header -->
 <?php require('utils.php');

 master_header();?>




  <!--Content-->
<div class="bodybody">
    <?php boutonsAcceuil()?>

  <div class="container-fluid">

    <div class="row">
      <div class="col-1"></div>
      <div class="col lg-6">
        <a href="mariage.php" style="text-decoration:none">
        <div class="mariage">
        </div>
        <div class="mariageText">
        Organisez votre Mariage
        </div>
        </a>
      </div>
      <div class="col lg-6">
        <a href="index3.html" style="text-decoration:none">
        <div class="luneDeMiel">
        </div>
        <div class="luneDeMielText">
          Organisez votre Lune de Miel
        </div>
        </a>
      </div>
    </div>
    <div class="row">
    
      <div class="col-1"></div>
        <div class="col">
          <a href="http://localhost/HACKATONSITE/index3.html" style="text-decoration:none">
          <div class="soiree">
          </div>
          <div class="soireeText">
          Organisez votre Soirée
          </div>
          </a>
        </div>
        <div class="col">
          <a href="http://localhost/HACKATONSITE/index3.html" style="text-decoration:none">
          <div class="anniv">
          </div>
          <div class="annivText">
            Organisez votre Anniversaire
          </div>
          </a>
        </div>
    </div>
  </div>  
</div>

  <!--footer-->
 <?php master_footer(); ?>
</body>


</html>