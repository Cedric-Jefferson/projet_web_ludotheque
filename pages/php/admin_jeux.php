<?php
include_once('../../scripts/php/cookie.php'); 
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

<h2>Page admin</h2>
<br/>

<h3>Gestion des jeux</h3>

<a href="admin.php">Retour</a>

<form name="myform5">
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
</form>
<br>

<?php

    $bdd=null;
    $dsn = 'mysql:dbname=ludotheque;host=127.0.0.1';
    $user = 'root';
    $password = '';
    $delai = 0;
    $urli = 'admin_jeux.php?user='.$_SESSION['nom_usr'].'&session='.$_SESSION['id_session'];
    $urlq = 'admin_jeux.php';

    try{
        $bdd=new PDO($dsn,$user,$password);

        //$req0 = $bdd->query('SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = "jeux" ');
        $req = $bdd->query("SELECT * FROM jeux");
?>
          <table id="myTable">
            <tr class="header">
              <th>id_jeu</th>
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
              <th>nbre_jeux_total</th>
              <th>nbre_jeux_dispo</th>
              <th>categorie</th>
              <th>image</th>
              <th>
                <form name="myform7" action="admin_jeux.php" method="post">
                      <input type="submit" id="ajout_id" name="ajout_jeu" value="Ajouter">
                </form>
              </th>
            </tr>
            <?php
            while ($data = $req->fetch())
            {
            ?>
                <tr id="table_jeux">
                  <td><?php echo $data["id_jeu"]; ?></td>
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
                  <td><?php echo $data["nbre_jeux_total"]; ?></td>
                  <td><?php echo $data["nbre_jeux_dispo"]; ?></td>
                  <td><?php echo $data["categorie"]; ?></td>
                  <td><img class="image" src="../../<?php echo $data["image"]; ?>" style="width:30%"></td>
                  <td>
                    <form name="myform6" action="admin_jeux.php" method="post">
                      <input type="submit" id="supp_id" name="supp2" value="Supprimer">
                      <input type="hidden" id="jeu_id" name="supp_jeu" value="<?php echo $data["id_jeu"]; ?>">
                    </form>
                  </td>
                </tr>
            <?php
            }
    }catch(EXCEPTION $e){
      die("erreur de connection a pdo".$e->getMessage());
    }
            ?>
          </table>
          
          <?php
        if (isset($_POST['supp_jeu']) AND isset($_POST['supp2'])) {

          $bdd2=null;
          $dsn = 'mysql:dbname=ludotheque;host=127.0.0.1';
          $user = 'root';
          $password = '';
          $delai = 0;
          $urli = 'admin_jeux.php?user='.$_SESSION['nom_usr'].'&session='.$_SESSION['id_session'];
          $urlq = 'admin_jeux.php';

            //header('Location:"'.$urlq.'"');
            try{
              $id_jeu = $_POST['supp_jeu'];

              $bdd2=new PDO($dsn,$user,$password);
              $req2 = $bdd2->query('DELETE FROM jeux WHERE id_jeu = '.$id_jeu.' ');
              while ($data2 = $req2->fetch())
              {
                  echo "<script>alert('Jeu supprimé');</script>";
              }
              /*$data2 = $req2->fetchAll();
              $nb_data2 = count($data2);
              if($nb_data2 < 0){
                header("Refresh:$delai;url=$urli");
              }else{*/
                //header("Refresh:$delai;url=$urlq");
              //}
            }catch(EXCEPTION $e){
              die("erreur de connection a pdo".$e->getMessage());
            }
        }

        if (isset($_POST['ajout_jeu'])) {
          echo '<div class="ajout_jeu">
          <h2>Ajouter un jeu</h2>
          
          <form name="myform8" action="admin_jeux.php" method="post" onsubmit="return validateForm()">
            Nom du jeu:<br>
            <input type="text" name="nom_jeu">
            <br>
            Référence:<br>
            <input type="text" name="reference">
            <br>
            Description:<br>
            <input type="text" name="description" placeholder="Donnez une description brève du jeu...">
            <br>
            Note:<br>
            <input type="number" name="note">
            <br>
            Date de sortie:<br>
            <input type="date" name="date_de_sortie">
            <br>
            Concepteur:<br>
            <input type="text" name="concepteur">
            <br>
            Age du public:<br>
            <input type="number" name="age_public">
            <br>
            Nombre de joueurs:<br>
            <input type="number" name="caractere">
            <br>
            Mode de jeu:<br>
            <select name="mode">
              <option value="Moi et les autres">Moi et les autres</option>
              <option value="Mondes fantastiques et imaginaires">Mondes fantastiques et imaginaires</option>
              <option value="Art">Art</option>
              <option value="Nature et animaux">Nature et animaux</option>
            </select>
            <br>
            Type de jeu :<br>
            <select name="type">
              <option value="Action">Action</option>
              <option value="Aventure">Aventure</option>
              <option value="Adresse">Adresse</option>
              <option value="Strategie">Strategie</option>
              <option value="Roleplay">Roleplay</option>
              <option value="Logique">Logique</option>
              <option value="Calcul mental">Calcul mental</option>
              <option value="Géométrie">Géométrie</option>
              <option value="Langage">Langage</option>
              <option value="Lettre">Lettre</option>
              <option value="Construction">Construction</option>
            </select>
            <br>
            Nombre de jeux total :<br>
            <input type="number" name="nbre_jeux_total">
            <br>
            Nombre de jeux disponibles:<br>
            <input type="number" name="nbre_jeux_dispo">
            <br>
            Catégorie de jeu :<br>
            <select name="categorie">
              <option value="Jeu de societe">Jeu de société</option>
              <option value="Jeu professionnel">Jeu professionnel</option>
              <option value="Jeu de cartes">Jeu de cartes</option>
              <option value="Accessoires">Accessoires</option>
              <option value="Jeu de des">Jeu de dés</option>
              <option value="Jeu tactile">Jeu tactile</option>
              <option value="Jeu de construction">Jeu de construction</option>
              <option value="Jeu de manipulation">Jeu de manipulation</option>
            </select>
            <br>
            Chemin vers une image du jeu (ex: assets/assassins_creed_odyssey.jpg):<br>
            <input type="text" name="image">
            <br>
            <input type="submit" value="Submit">
            <a href="#table_jeux">Annuler</a>
          </form>
          </div>';
        }

        if (isset($_POST["nom_jeu"]) AND isset($_POST["reference"]) AND isset($_POST["description"]) AND isset($_POST["note"]) AND isset($_POST["date_de_sortie"]) AND isset($_POST["concepteur"]) AND isset($_POST["age_public"]) AND isset($_POST["caractere"]) AND isset($_POST["mode"]) AND isset($_POST["type"]) AND isset($_POST["nbre_jeux_total"]) AND isset($_POST["nbre_jeux_dispo"]) AND isset($_POST["categorie"]) AND isset($_POST["image"])) {
          //Récupération depuis le formulaire des variables à traiter et stocker dans la base données
          echo '<script>alert("Test")</script>';
      
          $bdd2=null;
          $dsn = 'mysql:dbname=ludotheque;host=127.0.0.1';
          $user = 'root';
          $password = '';
          $delai = 0;
          $urli = 'admin_jeux.php?user='.$_SESSION['nom_usr'].'&session='.$_SESSION['id_session'];
          $urlq = 'admin_jeux.php';
      
          try{

              $bdd2=new PDO($dsn,$user,$password);
              $bdd2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $req = $bdd2->prepare('INSERT INTO jeux (nom_jeu, reference, description, note, date_de_sortie, concepteur, age_public, caractere, mode, type, nbre_jeux_total, nbre_jeux_dispo, categorie, image) 
              VALUES (:nom_jeu, :reference, :description, :note, :date_de_sortie, :concepteur, :age_public, :caractere, :mode, :type, :nbre_jeux_total, :nbre_jeux_dispo, :categorie, :image)');
              $req->bindParam(':nom_jeu', $nom_jeu);
              $req->bindParam(':reference', $reference);
              $req->bindParam(':description', $description);
              $req->bindParam(':note', $note);
              $req->bindParam(':date_de_sortie', $date_de_sortie);
              $req->bindParam(':concepteur', $concepteur);
              $req->bindParam(':age_public', $age_public);
              $req->bindParam(':caractere', $caractere);
              $req->bindParam(':mode', $mode);
              $req->bindParam(':type', $type);
              $req->bindParam(':nbre_jeux_total', $nbre_jeux_total);
              $req->bindParam(':nbre_jeux_dispo', $nbre_jeux_dispo);
              $req->bindParam(':categorie', $categorie);
              $req->bindParam(':image', $image);

              $nom_jeu = $_POST["nom_jeu"];
              $reference = $_POST["reference"];
              $description = $_POST["description"];
              $note = $_POST["note"];
              $date_de_sortie = $_POST["date_de_sortie"];
              $concepteur = $_POST["concepteur"];
              $age_public = $_POST["age_public"];
              $caractere = $_POST["caractere"];
              $mode = $_POST["mode"];
              $type = $_POST["type"];
              $nbre_jeux_total = $_POST["nbre_jeux_total"];
              $nbre_jeux_dispo = $_POST["nbre_jeux_dispo"];
              $categorie = $_POST["categorie"];
              $image = $_POST["image"];

              $req->execute();

              echo '<script>alert("Jeu enregistré")</script>';

              header("Refresh:$delai;url=$urlq");
          }catch(EXCEPTION $e){
              die("erreur de connection a pdo".$e->getMessage());
          }
      }

?>


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