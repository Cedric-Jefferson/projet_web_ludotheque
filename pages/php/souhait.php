<?php
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

<h2>Souhait</h2>
<a href="jeux.php">Retour à la page des jeux</a>

<form name="myform" action="../../scripts/php/verifsouhait.php" method="post" onsubmit="return validateForm()">
  Nom du jeu:<br>
  <input type="text" name="nom_souhait">
  <br>
  <input type="submit" value="Submit">
</form> 

<script>
function validateForm() {
  var nom_souhait = document.forms["myform"]["nom_souhait"].value;
  if (nom_souhait == "") {
    alert("Le nom du jeu n'est pas rempli");
    return false;
  }
  alert("Bonjour");
} 
</script>

</body>
</html>