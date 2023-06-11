<html>
<body>
    

<?php
session_start();
include 'config/config.inc.php';
include 'config/fonctions.inc.php';
include 'config/header.inc.php';

//je veux un truc à afficher pour test si ça fonctionne la page

?>
<main class="main-content">
    <div class="left-content">
        <h1>DailyDrivers</h1>
        <p>L'application de covoiturage éco-responsable qui vous offre un vaste choix de trajets à petits prix, tout en contribuant à réduire votre empreinte écologique.</p>
        <a href="#" class="main-btn"><i class="fas fa-search"></i> Rechercher un trajet</a>
        <a href="#" class="main-btn secondary">Proposer un trajet <i class="fas fa-arrow-right"></i></a>
    </div>
    <div class="right-content">
        <img src="assets/imgs/section1.svg" alt="Description de l'image" />
    </div>
</main>
</body>
</html>