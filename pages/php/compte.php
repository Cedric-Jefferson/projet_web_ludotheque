<?php /*require("scripts/php/session.php");*/ ?>
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
            <a href="forum.php">Forum</a>
            <a href="compte.php">Mon Compte</a>
            <div class="dropdown">
                <button class="dropbtn">Jeux 
                    <i class="fa fa-caret-down"></i>
                    <a href="jeux.php"></a>
                </button>
                <div class="dropdown-content">
                    <a href="jeux.php">Nouveautés</a>
                    <a href="jeux.php">Vos jeux</a>
                    <a href="jeux.php">Vos favoris</a>
                    <a href="jeux.php">Vos souhaits</a>
                    <a href="jeux.php">Réserver un jeu</a>
                    <a href="jeux.php">Rechercher un jeu</a>
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
            <div class="mySlides1">
                <img src="assets/assassin's_creed_odyssey.jpg" style="width:100%">
            </div>

            <div class="mySlides1">
                <img src="assets/resident_evil_7.jpg" style="width:100%">
            </div>

            <div class="mySlides1">
                <img src="assets/sekiro.jpg" style="width:100%">
            </div>

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
    </body>
    <script src = "scripts/js/index.js"></script>
</html>