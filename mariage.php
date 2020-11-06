<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css?family=Rum+Raisin" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">

  <title>Mariage</title>

</head>

<body>

<?php require('utils.php');

master_header();?>

<div class="bodybodymariage">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
      <div class="titleMariage">
        Organiser votre Mariage
      </div>
     
    </div>
  </div> 
    <div class="row">
      <div class="col-1"></div>
      <div class="col lg-6">
        <a href="index3.html" style="text-decoration:none">
        <div class="mariage1">
        </div>
        <div class="mariage1Text">
          <p>Pouvoir choisir la décoration de vos rêves, 
          c'est choisir les meilleurs décorateurs 
          des Marquises.</p>
          
        </div>
        </a>
      </div>
      <div class="col lg-6">
        <a href="index3.html" style="text-decoration:none">
          <div class="mariage2">
          </div>
          <div class="mariage2Text">
          <p>Avoir les plus beaux bouquets à son mariage 
          c'est avoir les plus beaux fleuristes 
          des Marquises.</p>
          
        </div>
        </a>
      </div>
    </div>

    <div class="row">
      <div class="col-1"></div>
        <div class="col">
          <a href="index3.html" style="text-decoration:none">
            <div class="mariage3">
            </div>
            <div class="mariage3Text">
            <p> Pouvoir danser et partager son << oui >>
            en musique, c'est avoir les plus bons musiciens 
            de Marquises.</p>
            
          </div>
          </a>
        </div>
        <div class="col">
          <a href="index3.html" style="text-decoration:none">
            <div class="mariage4">
            </div>
            <div class="mariage4Text">
            <p>Avoir les plus bons plats à son banquet de mariage,
            c'est avoir les meilleurs traiteurs des Marquises.</p>
            
          </div>
          </a>
        </div>
    </div>

    <div class="row">
      <div class="col-1"></div>
        <div class="col">
          <a href="index3.html" style="text-decoration:none">
            <div class="mariage5">
            </div>
            <div class="mariage5Text">
            <p>Pouvoir rêver et faire rêver en danse,
            c'est avoir le meilleur groupe de danse
            des Marquises.</p>
            
          </div>
          </a>
        </div>
        <div class="col">
          <a href="index3.html" style="text-decoration:none">
            <div class="mariage6">
            </div>
            <div class="mariage6Text">
            <p>Avoir les plus beaux transports le jour de son mariage,
            c'est avoir les plus belles voiture
            des Marquises.</p>
            
          </div>
          </a>
        </div>
    </div>
  </div>  

    <div class="row">    
      <div class="col mt-5"><?php boutonsOrganiserVotreMariage();?>
    </div>

</div>

</div>

<?php

master_footer();

?>

 
  



</body>


</html>