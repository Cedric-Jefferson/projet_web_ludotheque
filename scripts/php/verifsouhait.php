<?php

include_once('cookie.php');

if (isset($_POST['nom_souhait'])) {
    //Récupération depuis le formulaire des variables à traiter et stocker dans la base données
    //$nom_souhait = $_POST['nom_souhait'];

    $bdd=null;
    $dsn = 'mysql:dbname=ludotheque;host=127.0.0.1';
    $user = 'root';
    $password = '';
    $delai = 0;
    $urli = '../../pages/php/souhait.php?user='.$_SESSION['nom_usr'].'&session='.$_SESSION['id_session'];
    $urlq = '../../pages/php/jeux.php';

    try{
        $bdd=new PDO($dsn,$user,$password);
        $req0 = $bdd->query('SELECT id_usr FROM Users WHERE num_adherent = '.$_SESSION["num_adherent"].''); 
        $data0 = $req0->fetch();
        $req2 = $bdd->prepare("INSERT INTO souhaits (nom_souhait, id_usr) VALUES (?, ?)");
        $req2->execute(array($_POST['nom_souhait'], $data0[0]));
    }catch(EXCEPTION $e){
        die("erreur de connection a pdo".$e->getMessage());
    }
}

$data = $req2->fetchAll();
$nb_data = count($data);
if($nb_data < 0){
  header("Refresh:$delai;url=$urli");
}else{
  header("Refresh:$delai;url=$urlq");
}
 ?>