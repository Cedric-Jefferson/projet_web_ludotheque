<?php

include_once('cookie.php');
include_once('../../pages/php/fonctions.php');

if (isset($_POST["nom_usr"]) && isset($_POST["prenom_usr"]) && isset($_POST["date_de_naissance"]) && isset($_POST["password"]) && isset($_POST["email"])) {
    //Récupération depuis le formulaire des variables à traiter et stocker dans la base données
    $nom_usr = $_POST["nom_usr"];
    $prenom_usr = $_POST["prenom_usr"];
    $date_de_naissance = $_POST["date_de_naissance"];
    $password =  $_POST["password"];
    $email =  $_POST["email"];
    $num_adherent = intval(genere_prefixe_aleatoire(6), 10);
    $id_usr_forum = intval(genere_prefixe_aleatoire(6), 10);
    $id_session = intval(genere_prefixe_aleatoire(6), 10);


    $delai = 0;
    $urli = '../../pages/php/inscription.php';
    $urlq = '../../pages/php/connexion.php';

    try{
		$bdd = bdd_access();
        $req = $bdd->prepare('INSERT INTO Users (nom_usr, prenom_usr, num_adherent, password, date_de_naissance, email, id_usr_forum, id_session) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        $req->execute(array($nom_usr, $prenom_usr, $num_adherent, $password, $date_de_naissance, $email, $id_usr_forum, $id_session));
        echo 'Inscription réussie. Allez vous connecter!';
        header("Refresh:$delai;url=$urlq");
    }catch(EXCEPTION $e){
        die("erreur de connection a pdo".$e->getMessage());
    }
}

/*$data = $req->fetchAll();
$nb_data = count($data);
if($nb_data < 0){
  header("Refresh:$delai;url=$urli");
}else{
  header("Refresh:$delai;url=$urlq");
}*/














/*include(fonctions.php);

$Server="127.0.0.1";
$User="root";
$Pwd="";
$DB="ludotheque";

$Connect = mysqli_connect($Server, $User, $Pwd, $DB);
if (!$Connect)
echo "Connexion a la base impossible";

/*$Query = "INSERT INTO Users (nom, prenom, date_de_naissance, password, email) VALUES ('$_POST["nom"]', '$_POST["prenom"]', '$_POST["password"]', '$_POST["date"]', '$_POST["email"])'";
if (mysqli_query($Connect, $Query)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $Query . "<br>" . mysqli_error($Connect);
}

$stmt = $Connect->prepare("INSERT INTO Users (nom_usr, prenom_usr, num_adherent, password, date_de_naissance, email, id_usr_forum) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $nom, $prenom, $date, $password, $email);

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$date = $_POST["date"];
$password =  $_POST["password"];
$email =  $_POST["email"];
$stmt->execute();
$last_id = mysqli_insert_id($Connect);
echo "New record created successfully";
// Définir la génération automatique d'un numéro d'adhérent
function genere_n_adherent($longueur){
    $caractere_au_choix1 = array(0,1,2,3,4,5,6,7,8,9);
    $prefixe = "";
    for($i=0; $i < $longueur; $i++) {
        
        $prefixe .= ($i%2) ? strtoupper($caractere_au_choix1[array_rand($caractere_au_choix1)]) : $caractere_au_choix1[array_rand($caractere_au_choix1)];
    }
    return $prefixe;
}

$sql = "SELECT n_adherent FROM Users WHERE id = ".$last_id;
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // selectionne les données de chaque champ
    while($row = mysqli_fetch_assoc($result)) {
        echo "Votre numéro d'adhérent est : " . $row["n_adherent"]. "<br>";
		require_once(\\pages/php/connexion.php);
    }
} else {
    echo "Aucun résultat";
}

$stmt->close();
mysqli_close($Connect);*/

?>