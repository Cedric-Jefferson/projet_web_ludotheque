<?php
//Remettre les variables de session à zéro. Arrêter la session
//include_once('cookie.php');
session_start();

if (isset($_POST['deconnex'])) {
    //Récupération depuis le formulaire des variables à traiter et stocker dans la base données

    $delai = 0;
    $urlq2 = '../../index.php';

    // remove all session variables
    session_unset(); 

    // destroy the session 
    session_destroy(); 
    header("Refresh:$delai;url=$urlq2");

}else{
    $delai = 0;
    include_once('cookie.php');
    $urlq1 = '../../pages/php/jeux.php?user='.$_SESSION['nom_usr'].'&session='.$_SESSION['id_session'];;
    header("Refresh:$delai;url=$urlq1");
}

 ?>