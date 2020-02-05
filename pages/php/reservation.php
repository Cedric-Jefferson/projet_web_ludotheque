<?php
    include_once("../../scripts/php/cookie.php"); 
?>
<!DOCTYPE html>
<html>
<head>
		<link type="text/css" href="../../styles/index.css" rel="stylesheet" />
        <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<h2>Reservation</h2>
<a href="jeux.php">Retour à la page des jeux</a>

<form name="myform" action="../../scripts/php/verifreservation.php" method="post" onsubmit="return validateForm()">
  Nom du jeu:<br>
  <?php

    if (isset($_POST['res_nom'])) {
      //Récupération depuis le formulaire des variables à traiter et stocker dans la base données
      $nom_jeu = $_POST['res_nom'];
      $contenu = '<input type="text" name="nom_jeu" readonly value="'.$nom_jeu.'">';
      echo $contenu;
    }else{
      $contenu = '<input type="text" name="nom_jeu">';
      echo $contenu;
    }

  ?>
  <br>
  Nombre d'exemplaires:<br>
  <input type="number" name="nbre_jeu">
  <br>
  Date de réservation:<br>
  <input type="date" name="date">
  <br>
  <input type="submit" value="Submit">
</form> 
<a href="jeux.php">Annuler</a>
<script>
function validateForm() {
  var nom_jeu = document.forms["myform"]["nom_jeu"].value;
  var nbre_jeu = document.forms["myform"]["nbre_jeu"].value;
  var date = document.forms["myform"]["date"].value;
  if (nom_jeu == ""|| nbre_jeu == "" || date == "") {
    alert("Certains champs ne sont pas remplis");
    return false;
  }
  alert("Bonjour");
} 
</script>

</body>
</html>