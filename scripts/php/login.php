<?php

include_once('cookie.php');

if (isset($_POST['num_adherent']) and isset($_POST['password'])) {
    //Récupération depuis le formulaire des variables à traiter et stocker dans la base données
    $pass = $_POST['password'];
    $num_adherent = $_POST['num_adherent'];

    $bdd=null;
    $dsn = 'mysql:dbname=ludotheque;host=127.0.0.1';
    $user = 'root';
    $password = '';
    $delai = 0;
    $urli = '../../pages/php/connexion.php?user='.$_SESSION['nom_usr'].'&session='.$_SESSION['id_session'];
    $urlq1 = '../../pages/php/home.php';
    $urlq2 = '../../pages/php/admin.php';

    try{
		$bdd=new PDO($dsn,$user,$password);
        $req = $bdd->prepare('SELECT num_adherent, password FROM Users WHERE password = :pass AND num_adherent = :n_adherent');
        $req->execute(array(":pass"=>$pass, ":n_adherent"=>$num_adherent));
    }catch(EXCEPTION $e){
        die("erreur de connection a pdo".$e->getMessage());
    }
}

$data = $req->fetchAll();
$nb_data = count($data);
if($nb_data < 0){
  header("Refresh:$delai;url=$urli");
}elseif($_SESSION["num_adherent"] != 0){
  header("Refresh:$delai;url=$urlq1");
}else{
  header("Refresh:$delai;url=$urlq2");
}
 ?>