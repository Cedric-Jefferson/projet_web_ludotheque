<?php
include_once('session.php');

$nom_usr = $_SESSION['nom_usr'];
$prenom_usr = $_SESSION['prenom_usr'];

setcookie('nom_usr', $nom_usr, time() + (86400*30), null, null, false, true);
setcookie('prenom_usr', $prenom_usr, time() + (86400*30), null, null, false, true); 
?>
<!DOCTYPE html>
<html>
<body>

<?php
if(!isset($_COOKIE['nom_usr'])) {
    //echo "Le cookie nom n'est pas changé!";
} else {
    /*echo "Le cookie nom est changé!<br>";
    echo "Le nom de l'adhérent est: " . $_COOKIE['nom_usr'];*/
}
?>

</body>
</html>