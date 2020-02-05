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

<h2>Inscription</h2>

<form name="myform" action="../../scripts/php/verifinscription.php" method="post" onsubmit="return validateForm()">
  Nom:<br>
  <input type="text" name="nom_usr">
  <br>
  Prénom:<br>
  <input type="text" name="prenom_usr">
  <br>
  Date de naissance:<br>
  <input type="date" name="date_de_naissance">
  <br>
  Mot de passe:<br>
  <input type="password" name="password">
  <br>
  Email:<br>
  <input type="text" name="email">
  <br>
  <input type="submit" value="Submit">
</form> 

<script>
function validateForm() {
  var nom_usr = document.forms["myform"]["nom_usr"].value;
  var prenom_usr = document.forms["myform"]["prenom_usr"].value;
  var date_de_naissance = document.forms["myform"]["date_de_naissance"].value;
  var password = document.forms["myform"]["password"].value;
  var email = document.forms["myform"]["email"].value;
  if (nom_usr == "" || prenom_usr == "" || date_de_naissance == "" || password == "" || email == "") {
    alert("Certains champs ne sont pas remplis");
    return false;
  }
  alert("Bonjour");
} 
</script>

</body>
</html>