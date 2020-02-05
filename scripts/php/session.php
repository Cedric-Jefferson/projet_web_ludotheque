 <?php
// Start the session
include_once('../../pages/php/fonctions.php');
session_start();

// Set session variables

if(isset($_POST["num_adherent"]) AND isset($_POST["password"])){
	$_SESSION["num_adherent"] = $_POST["num_adherent"];
	$_SESSION["password"] = $_POST["password"];
	$bdd = bdd_access();
	$req1 = $bdd->query('SELECT * FROM Users WHERE num_adherent = '.$_SESSION["num_adherent"].'');
	$data1 = $req1->fetch();
	$_SESSION["nom_usr"] = $data1["nom_usr"];
	$_SESSION["prenom_usr"] = $data1["prenom_usr"];
	$_SESSION["date_de_naissance"] = $data1["date_de_naissance"];
	$_SESSION["email"] = $data1["email"];
	$_SESSION["id_session"] = $data1['id_session'];
	$_SESSION["id_usr_forum"] = $data1['id_usr_forum'];
	echo "<script>alert('Connexion valide');</script>";
}else{
	//echo "<script>alert('Connexion invalide');</script>";
}

?>