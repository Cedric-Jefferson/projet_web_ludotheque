<?php

include_once('cookie.php');

if (isset($_POST['jeu_fav']) AND isset($_POST['fav'])) {
    //Récupération depuis le formulaire des variables à traiter et stocker dans la base données
    //$id_jeu = $_POST['jeu_fav'];

    $bdd=null;
    $dsn = 'mysql:dbname=ludotheque;host=127.0.0.1';
    $user = 'root';
    $password = '';
    $delai = 0;
    $urli = '../../pages/php/jeux.php?user='.$_SESSION['nom_usr'].'&session='.$_SESSION['id_session'];
    $urlq = '../../pages/php/jeux.php';

    try{
        $bdd=new PDO($dsn,$user,$password);
        $req0 = $bdd->query('SELECT id_usr FROM Users WHERE num_adherent = '.$_SESSION["num_adherent"].''); 
        $data0 = $req0->fetch();
        /*$req1 = $bdd->query('SELECT id_jeu FROM jeux WHERE nom_jeu = '.$_POST["jeu_fav"].''); 
        $data1 = $req1->fetch();*/
        $req2 = $bdd->prepare("INSERT INTO jeuxfav (id_jeu, id_usr) VALUES (?, ?)");
        $req2->execute(array($_POST['jeu_fav'], $data0[0]));
        echo "<script>alert('Ajouté aux favoris')</script>";
    }catch(EXCEPTION $e){
        die("erreur de connection a pdo".$e->getMessage());
    }
}

$data2 = $req2->fetchAll();
$nb_data = count($data2);
if($nb_data < 0){
  header("Refresh:$delai;url=$urli");
}else{
  header("Refresh:$delai;url=$urlq");
}
 ?> 