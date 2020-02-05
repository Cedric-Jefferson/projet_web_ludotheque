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

<h2>Connexion</h2>

<form name="myform" action="../../scripts/php/login.php" method="post" onsubmit="return validateForm()">
  N° adhérent:<br>
  <input type="text" name="num_adherent">
  <br>
  Mot de passe:<br>
  <input type="password" name="password">
  <br>
  <input type="submit" value="Submit">
</form> 
<h3>Vous n'avez pas de compte? <a href="inscription.php">Inscrivez-vous</a></h3>
<script>
function validateForm() {
  var num_adherent = document.forms["myform"]["num_adherent"].value;
  var password = document.forms["myform"]["password"].value;
  if (num_adherent == ""|| password == "") {
    alert("Certains champs ne sont pas remplis");
    return false;
  }
  alert("Bonjour");
} 
</script>

</body>
</html>