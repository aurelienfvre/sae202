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
        <a href="reserverTrajet.php" class="main-btn"><i class="fas fa-search"></i> Rechercher un trajet</a>
        <a href="proposerTrajet.php" class="main-btn secondary">Proposer un trajet <i class="fas fa-arrow-right"></i></a>
    </div>
    <div class="right-content">
        <img src="assets/imgs/section1.svg" alt="Passant qui trouve une voiture pour faire du covoiturage" />
    </div>
</main>

<div class="main-content2">
    <img class="main-content-image" src="assets/imgs/section2.svg" alt="Passant qui trouve une voiture pour faire du covoiturage">

    <div class="form-container">
        <h2 class="form-title">OÙ ALLEZ VOUS ?</h2>

        <form action="resultatRechercheTrajet.php" method="post">
            <div class="form-group">
            <i class="fas fa-map-pin fa-2x"></i>
                <label for="depart" class="visuallyhidden">Départ</label>
                <input type="text" id="depart" name="depart" placeholder="Départ" required="">
            </div>
            <div class="form-group">
            <i class="fas fa-map-pin fa-2x"></i>
                <label for="arrivee" class="visuallyhidden">Arrivée</label>
                <input type="text" id="arrivee" name="arrivee" placeholder="Arrivée" required="">
            </div>
            <div class="form-group">
            <i class="fas fa-calendar-alt fa-2x"></i>
                <label for="date" class="visuallyhidden">Date de départ</label>
                <input type="date" id="date" name="date" required="">
            </div>
            <div class="form-group">
            <i class="fas fa-users fa-2x"></i>
                <label for="places" class="visuallyhidden">Nombre de places</label>
                <select id="places" name="places" required>
                    <option selected disabled>Nombre de places</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
            <div class="form-group">
                <button class="main-btn1">Rechercher</button>
            </div>
        </form>
    </div>
</div>

<?php include 'config/footer.inc.php'; ?>

</body>
</html>