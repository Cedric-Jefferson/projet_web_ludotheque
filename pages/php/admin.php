<?php
include_once('../../scripts/php/cookie.php'); 
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

<h2>Page admin</h2>
<br/>

<div class="connexion-container">
            <form name="myform" action="../../scripts/php/verifdeconnexion.php" method="post">
                <input type="submit" id="fav" value="Se déconnecter" name="deconnex">
            </form>
</div>
<br>

<a href="admin_users.php">Gestion des utilisateurs</a>
<a href="admin_jeux.php">Gestion des jeux</a>

<script>
</script>

</body>
</html>