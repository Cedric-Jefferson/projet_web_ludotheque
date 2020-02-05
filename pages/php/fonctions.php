<?php
//Fichier de Fonctions

//Fonction de connexion à la base de données
function bdd_access()
{
    $bdd = null;
    $dsn = 'mysql:dbname=ludotheque;charset=utf8;host=127.0.0.1';
    $user = 'root';
    $password = '';
    $pdo_options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try
    {
        //On se connecte à MySQL
        $bdd = new PDO($dsn, $user, $password, $pdo_options);
    }
    catch (Exception $e)
    {
       //En cas d'erreur, on affiche un message et on arrète tout
       die('Erreur : '.$e->getMessage());
    }

    return $bdd;
}

//Fonction de rafraîchissemment
function refresher($url, $delay)
{
    header("Refresh:$delay;url=$url");
}


//Génération du préfixe
function genere_prefixe_aleatoire($longueur){
    $caractere_au_choix1 = array(0,1,2,3,4,5,6,7,8,9);
    $prefixe = "";
    for($i=0; $i < $longueur; $i++) {
        
        $prefixe .= ($i%2) ? strtoupper($caractere_au_choix1[array_rand($caractere_au_choix1)]) : $caractere_au_choix1[array_rand($caractere_au_choix1)];
    }
    return $prefixe;
}

function genere_suffixe_aleatoire($longueur){
    $caractere_au_choix = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z",0,1,2,3,4,5,6,7,8,9);
    $suffixe = "";
    for($i=0; $i < $longueur; $i++) {
        $suffixe .= ($i%2) ? strtoupper($caractere_au_choix[array_rand($caractere_au_choix)]) : $caractere_au_choix[array_rand($caractere_au_choix)];
    }
    return $suffixe;
}

?>