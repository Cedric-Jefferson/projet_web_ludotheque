<?php
    include_once("fonctions.php"); 
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
	<body class="corps">
        <div class="navbar">
            <a href="#Contact">Contact</a>
            <a href="#AboutUs">About Us</a>
            <a href="forum.php">Forum</a>
            <a href="compte.php">Mon Compte</a>
            <div class="dropdown">
                <button class="dropbtn">Jeux 
                    <i class="fa fa-caret-down"></i>
                    <a href="jeux.php"></a>
                </button>
                <div class="dropdown-content">
                    <a href="#nouveautes">Nouveautés</a>
                    <a href="#vosreservations">Vos réservations</a>
                    <a href="#vosfavoris">Vos favoris</a>
                    <a href="souhait.php">Vos souhaits</a>
                    <a href="reservation.php">Réserver un jeu</a>
                    <a href="recherche.php">Rechercher un jeu</a>
                </div>
            </div>
            <a href="home.php">Home/Dashboard</a>
            <h3>Ludothèque</h3>
        </div>
        <?php
            echo '<h1>Bonjour '.$_SESSION["nom_usr"].' '.$_SESSION["prenom_usr"].'</h1>';
        ?>
        <div class="connexion-container">
            <form name="myform" action="../../scripts/php/verifdeconnexion.php" method="post">
                <input type="submit" id="fav" value="Se déconnecter" name="deconnex">
            </form>
        </div>
        <br>
        <div class="connexion-container">
            <a class="rechtext" href="recherche.php">Rechercher un jeu<img class="rechimg" src="../../assets/ic_search.png"></a>
        </div>

        <br/>

        <section id=nouveautes>
      
            <h3>Nouveautés</h3>
            <div class="slideshow-container">
            <?php
                $bdd = bdd_access();
                $req = $bdd->query('SELECT * FROM jeux');

                while ($data = $req->fetch()){
                    $id = $data['id_jeu'];
            ?>   
                    <div class="mySlides1">
                    <div class="favori-container">
                        <form name="myform" action="../../scripts/php/veriffavori.php" method="post" onsubmit="changement_icone()">
                            <?php
                            $contenu = '<input type="submit" id="fav" value="." name="fav" class="bouton_favori">
                                        <input type="hidden" id="fav_id" name="jeu_fav" value="'.$id.'">';
                            echo $contenu;
                            ?>
                            <h4>Ajouter aux favoris</h4>
                        </form> 
                         <!--<button>
                            <a href="javascript:void(0);" class="topnav-icons fa w3-right w3-bar-item w3-button" onclick="open_search(this)" title="Search W3Schools"></a>
                        </button>-->
                    </div> 
                    <div class="hoverimage">
                    <strong>Jeu</strong> : <?php echo $data['nom_jeu']; ?><br />
                    <?php 
                    $contenu = '<img class="image" src="../../'.$data['image'].'" style="width:100%">';
                    echo $contenu;
                    ?>
                    <form name="myform" action="reservation.php" method="post">
                        <?php
                            $contenu = '<input type="submit" id="res" value="Réserver" name="res">
                                        <input type="hidden" id="res_nom" name="res_nom" value="'.$data['nom_jeu'].'">';
                            echo $contenu;
                        ?>
                    </form>
                    <button class="hoverbtn">Détails 
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="hover-content">
                    <?php 
                    $contenu = ''.$data['description'].'<br/>Nbre de jeux disponibles : '.$data['nbre_jeux_dispo'].'';
                    echo $contenu;
                    ?> 
                    </div>
                    </div>
                    </div>
                <?php
                }
            ?>
            <a class="prev" onclick="plusSlides(-1, 0)">&#10094;</a>
            <a class="next" onclick="plusSlides(1, 0)">&#10095;</a>
            </div>
        </section>
        <br/>
        <br/>
        <br/>

        <section id=vosreservations>
            <div class="reservation-container">
                <a href="reservation.php">Faire une réservation</a>
            </div>
            <h3>Vos réservations</h3>
            <div class="slideshow-container">
            <?php
                $bdd = bdd_access();
                $req0 = $bdd->query('SELECT * FROM Users WHERE num_adherent = '.$_SESSION["num_adherent"].''); 
                $data0 = $req0->fetch();
                $req1 = $bdd->query('SELECT * FROM reservations WHERE id_usr ='.$data0["id_usr"].''); 


                while ($data1 = $req1->fetch()){
            ?>   
                    <div class="mySlides2">
                    <div class="hoverimage">
                    <?php
                    $req2 = $bdd->query('SELECT * FROM jeux WHERE id_jeu ='.$data1["id_jeu"].'');
                    $data2 = $req2->fetch();
                    $contenu = '<img class="image" src="../../'.$data2['image'].'" style="width:100%">';
                    echo $contenu;
                    ?>
                    <button class="hoverbtn">Détails
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="hover-content">
                    <?php 
                    $contenu = '<p>'.$data2['description'].'</p>';
                    echo $contenu;
                    ?> 
                    </div>
                    </div>
                    <strong>Jeu</strong> : <?php echo $data2['nom_jeu']; ?><br />
                    <strong>Nombre de jeux réservés</strong> : <?php echo $data1['nbre_jeu']; ?><br />
                    </div>
                <?php
                }
            ?>
            <a class="prev" onclick="plusSlides(-1, 1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1, 1)">&#10095;</a>
        </div>
        </section>
        <br/>
        <br/>
        <br/>

        <section id=vosfavoris>

            <h3>Vos favoris</h3>
            <div class="slideshow-container">
            <?php
                $bdd = bdd_access();
                $req0 = $bdd->query('SELECT * FROM Users WHERE num_adherent = '.$_SESSION["num_adherent"].''); 
                $data0 = $req0->fetch();
                $req1 = $bdd->query('SELECT * FROM jeuxfav WHERE id_usr ='.$data0["id_usr"].''); 


                while ($data1 = $req1->fetch()){
            ?>   
                    <div class="mySlides3">
                    <div class="hoverimage">
                    <?php
                    $req2 = $bdd->query('SELECT * FROM jeux WHERE id_jeu ='.$data1["id_jeu"].'');
                    $data2 = $req2->fetch();
                    $contenu = '<img class="image" src="../../'.$data2['image'].'" style="width:100%">';
                    echo $contenu;
                    ?>
                    <button class="hoverbtn">Détails
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="hover-content">
                    <?php 
                    $contenu = '<p>'.$data2['description'].'</p>';
                    echo $contenu;
                    ?> 
                    </div>
                    </div>
                    <strong>Jeu</strong> : <?php echo $data2['nom_jeu']; ?><br />
                    </div>
                <?php
                }
            ?>
            <a class="prev" onclick="plusSlides(-1, 2)">&#10094;</a>
            <a class="next" onclick="plusSlides(1, 2)">&#10095;</a>
        </div>
        </section>
        <br/>
        <br/>
        <br/>

        <section id=vossouhaits>
            <div class="souhait-container">
                <a href="souhait.php">Ajouter un souhait</a>
            </div>
            <h3>Vos souhaits</h3>
            <div class="slideshow-container">
            <?php
                $bdd = bdd_access();
                $req0 = $bdd->query('SELECT * FROM Users WHERE num_adherent = '.$_SESSION["num_adherent"].''); 
                $data0 = $req0->fetch();
                $req1 = $bdd->query('SELECT * FROM souhaits WHERE id_usr ='.$data0["id_usr"].''); 


                while ($data1 = $req1->fetch()){
            ?>
                    <div class="mySlides4">
                        <strong>Jeu souhaité</strong> : <?php echo $data1['nom_souhait']; ?><br />
                    </div>
                <?php
                }
            ?>
            <a class="prev" onclick="plusSlides(-1, 3)">&#10094;</a>
            <a class="next" onclick="plusSlides(1, 3)">&#10095;</a>
        </div>
        </section>
        <br/>
        <br/>
        <br/>

        <section id="AboutUs">
            <p>Cedric Jefferson, Ingénieur en IA et développement pro-robotique</p>
        </section>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>

        <footer id="Contact">
        <p>Laisser moi un message</p>
        </footer>


    </body>
    <script>
        function changement_icone(){
            document.getElementById("fav").className = "bouton_favori_rempli";
        }
    </script>
    <script src = "../../scripts/js/index.js"></script>
</html>