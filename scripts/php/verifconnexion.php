<?php
require_once(session.php);

$Server="127.0.0.1";
$User="root";
$Pwd="";
$DB="ludotheque";

$Connect = mysqli_connect($Server, $User, $Pwd, $DB);
if (!$Connect)
echo "Connexion a la base impossible";

$sql = "SELECT n_adherent, password FROM Users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // selectionne les données de chaque champ
    while($row = mysqli_fetch_assoc($result)) {
        if($row["n_adherent"] == $_POST["n_adherent"] && $row["password"] == $_POST["password"]){
			require_once(accueil.php);
		}
    }
} else {
    echo "Aucun résultat";
}

$stmt->close();
mysqli_close($Connect);

?>