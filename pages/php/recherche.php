<?php
include_once("../../scripts/php/cookie.php"); 
?>
<!DOCTYPE html>
<html>
<head>
	<link type="text/css" href="../../styles/index.css" rel="stylesheet" />
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<h2>Rechercher un jeu</h2>
<a href="jeux.php">Retour à la page des jeux</a>

<form name="myform" action="recherche.php" method="post">
  <select name="critere">
    <option value="nom_jeu">Par nom</option>
    <option value="categorie">Par catégorie</option>
    <option value="age_public">Par age</option>
    <option value="type">Par type</option>
    <option value="note">Par note</option>
    <option value="caractere">Par nombre de joueurs</option>
    <option value="mode">Par mode</option>
    <option value="date_de_sortie">Par date de sortie</option>
  </select><br>
  <input type="text" id="myInput" name="search" onkeyup="myFunction()" placeholder="Search.." title="Type in a name">
</form>

<?php
/*if (isset($_POST['critere'])) {
          echo '<form name="myform" action="recherche.php" method="post">
                  <input type="text" id="myInput" name="search" onkeyup="myFunction()" placeholder="Search.." title="Type in a name">
                  <input type="hidden" id="crit" name="crit" value="'.$_POST["critere"].'">
                </form>';
}*/




if (isset($_POST['search']) AND isset($_POST['critere'])) {
    //Récupération depuis le formulaire des variables à traiter et stocker dans la base données

    $bdd=null;
    $dsn = 'mysql:dbname=ludotheque;host=127.0.0.1';
    $user = 'root';
    $password = '';
    $delai = 0;
    $urli = 'recherche.php?user='.$_SESSION['nom_usr'].'&session='.$_SESSION['id_session'];
    $urlq = 'recherche.php';

    try{
        $bdd=new PDO($dsn,$user,$password);
        $search = $_POST['search'];
        $critere = $_POST['critere'];
        //$req0 = $bdd->query('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = "users" ');
        $req = $bdd->query("SELECT * FROM jeux WHERE $critere LIKE '%$search%'");
      ?>
          <table id="myTable">
            <tr class="header">
              <th>nom_jeu</th>
              <th>reference</th>
              <th>description</th>
              <th>note</th>
              <th>date_de_sortie</th>
              <th>concepteur</th>
              <th>age_public</th>
              <th>caractere</th>
              <th>mode</th>
              <th>type</th>
              <th>nbre_jeux_dispo</th>
              <th>categorie</th>
              <th>image</th>
            </tr>
            <?php
            while ($data = $req->fetch())
            {
            ?>
                <tr>
                  <td><?php echo $data["nom_jeu"]; ?></td>
                  <td><?php echo $data["reference"]; ?></td>
                  <td><?php echo $data["description"]; ?></td>
                  <td><?php echo $data["note"]; ?></td>
                  <td><?php echo $data["date_de_sortie"]; ?></td>
                  <td><?php echo $data["concepteur"]; ?></td>
                  <td><?php echo $data["age_public"]; ?></td>
                  <td><?php echo $data["caractere"]; ?></td>
                  <td><?php echo $data["mode"]; ?></td>
                  <td><?php echo $data["type"]; ?></td>
                  <td><?php echo $data["nbre_jeux_dispo"]; ?></td>
                  <td><?php echo $data["categorie"]; ?></td>
                  <td><img class="image" src="../../<?php echo $data["image"]; ?>" style="width:30%"></td>
                </tr>
            <?php
            }
            ?>
          </table>
<?php           
        /*$data = $req->fetchAll();
        $nb_data = count($data);
        if($nb_data < 0){
          header("Refresh:$delai;url=$urli");
        }else{
          header("Refresh:$delai;url=$urlq");
        }*/
    }catch(EXCEPTION $e){
        die("erreur de connection a pdo".$e->getMessage());
    }
}


?> 

</html>

<script>
/*function validateForm() {
  var nom_jeu = document.forms["myform"]["search"].value;
  if (nom_jeu == "") {
    alert("Le nom du jeu n'est pas rempli");
    return false;
  }
  alert("Bonjour");
} */
</script>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>
</html>