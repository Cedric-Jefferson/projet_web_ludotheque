<?php
    include("pages/php/fonctions.php"); 
?>
<!DOCTYPE html>
<html>
	<head>
		<link type="text/css" href="styles/index.css" rel="stylesheet" />
        <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body class="corps">
        <div class="navbar">
            <a href="#Contact">Contact</a>
            <a href="#AboutUs">About Us</a>
            <a href="pages/php/connexion.php">Forum</a>
            <a href="pages/php/connexion.php">Mon Compte</a>
            <div class="dropdown">
                <button class="dropbtn">Jeux 
                    <i class="fa fa-caret-down"></i>
                    <a href="pages/php/connexion.php"></a>
                </button>
                <div class="dropdown-content">
                    <a href="pages/php/connexion.php">Nouveautés</a>
                    <a href="pages/php/connexion.php">Vos jeux</a>
                    <a href="pages/php/connexion.php">Vos favoris</a>
                    <a href="pages/php/connexion.php">Vos souhaits</a>
                    <a href="pages/php/connexion.php">Réserver un jeu</a>
                    <a href="pages/php/connexion.php">Rechercher un jeu</a>
                </div>
            </div>
            <a href="index.php">Home/Dashboard</a>
            <h3>Ludothèque</h3>
        </div>
        
        <div class="connexion-container">
            <a href="pages/php/connexion.php">Se connecter</a>
        </div>

        <h3>Parcourir</h3>
        <div class="slideshow-container">
            <?php
                $bdd = bdd_access();
                $req = $bdd->query('SELECT * FROM jeux');

                while ($data = $req->fetch()){
            ?>   
                    <div class="mySlides1">
                    <strong>Jeu</strong> : <?php echo $data['nom_jeu']; ?><br />
                    <div class="hoverimage">
                    <?php 
                    $contenu = '<img class="image" src="'.$data['image'].'" style="width:100%">';
                    echo $contenu;
                    ?>
                    <button class="hoverbtn">Détails 
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="hover-content">
                    <?php 
                    $contenu = '<p class="phov">'.$data['description'].'</p>';
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

        <h3>Offres spéciales</h3>
        <div class="slideshow-container">
            <div class="mySlides2">
                <img src="assets/img_band_chicago.jpg" style="width:100%">
            </div>

            <div class="mySlides2">
                <img src="assets/img_band_la.jpg" style="width:100%">
            </div>

            <div class="mySlides2">
                <img src="assets/img_band_ny.jpg" style="width:100%">
            </div>

            <a class="prev" onclick="plusSlides(-1, 1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1, 1)">&#10095;</a>
        </div>

        <h3>Recommandations</h3>
        <div class="slideshow-container">
            <div class="mySlides3">
                <img src="assets/img_5terre_wide.jpg" style="width:100%">
            </div>

            <div class="mySlides3">
                <img src="assets/img_mountains_wide.jpg" style="width:100%">
            </div>

            <div class="mySlides3">
                <img src="assets/img_woods_wide.jpg" style="width:100%">
            </div>

            <a class="prev" onclick="plusSlides(-1, 2)">&#10094;</a>
            <a class="next" onclick="plusSlides(1, 2)">&#10095;</a>
        </div>
        <br/>
        <br/>

        <section id="AboutUs">
            <p>Cedric Jefferson, Ingénieur en IA et développement pro-robotique</p>
        </section>
        <br/>
        <br/>

        <footer id="Contact">
        <p>Laisser moi un message</p>
        </footer>

    </body>
    <script src = "scripts/js/index.js"></script>
</html>