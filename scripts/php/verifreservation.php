<?php

include_once('cookie.php');

if (isset($_POST['nom_jeu']) AND isset($_POST['nbre_jeu']) AND isset($_POST['date'])) {
    //Récupération depuis le formulaire des variables à traiter et stocker dans la base données
    /*$nom_jeu = $_POST['nom_jeu'];
    $nbre_jeu = $_POST['nbre_jeu'];
    $date = $_POST['date'];*/

    $bdd=null;
    $dsn = 'mysql:dbname=ludotheque;host=127.0.0.1';
    $user = 'root';
    $password = '';
    $delai = 0;
    $urli = '../../pages/php/reservation.php?user='.$_SESSION['nom_usr'].'&session='.$_SESSION['id_session'];
    $urlq = '../../pages/php/jeux.php';

    try{
        $bdd=new PDO($dsn,$user,$password);
        $req0 = $bdd->query('SELECT id_usr FROM Users WHERE num_adherent = '.$_SESSION["num_adherent"].''); 
        $data0 = $req0->fetch();
        $req1 = $bdd->query('SELECT * FROM jeux WHERE nom_jeu = "'.$_POST['nom_jeu'].'"'); 
        $data1 = $req1->fetch();
        $req2 = $bdd->prepare("INSERT INTO reservations (nbre_jeu, id_jeu, id_usr, date_reservation) VALUES (?, ?, ?, ?)");
        $req2->execute(array($_POST['nbre_jeu'], $data1['id_jeu'], $data0[0], $_POST['date']));
        $nb = $data1["nbre_jeux_dispo"] - $_POST['nbre_jeu']; echo $nb;
        $req3 = $bdd->prepare('UPDATE jeux SET nbre_jeux_dispo = :nb WHERE id_jeu = '.$data1["id_jeu"].'');
        $req3->execute(array(
          'nb' => $nb
        ));
    }catch(EXCEPTION $e){
        die("erreur de connection a pdo".$e->getMessage());
    }
}

$data2 = $req2->fetchAll();
$nb_data2 = count($data2);
if($nb_data2 < 0){
  header("Refresh:$delai;url=$urli");
}else{
  header("Refresh:$delai;url=$urlq");
}
 ?>