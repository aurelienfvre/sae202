<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: formConnexion.php"); 
    exit;
}
include 'config/config.inc.php';
include 'config/fonctions.inc.php';
include 'config/header.inc.php';
?>

<div class="fullscreen-div">
<div class="form-container-new">
    <h2 class="form-title-new">Proposer un trajet</h2>

    <form action="resultatTrajetProposer.php" method="post">
        <div class="form-group-new">
            <i class="fas fa-map-pin fa-2x"></i>
            <label for="depart" class="visuallyhidden">Départ</label>
            <input type="text" id="depart" name="depart" placeholder="Départ" required>
        </div>
        <div class="form-group-new">
            <i class="fas fa-map-pin fa-2x"></i>
            <label for="arrivee" class="visuallyhidden">Arrivée</label>
            <input type="text" id="arrivee" name="arrivee" placeholder="Arrivée" required>
        </div>
        <div class="form-group-new">
            <i class="fas fa-calendar-alt fa-2x"></i>
            <label for="date" class="visuallyhidden">Date de départ</label>
            <input type="date" id="date" name="date" required>
        </div>
        <div class="form-group-new">
            <i class="fas fa-clock fa-2x"></i>
            <label for="heure_depart" >Heure de départ</label>
            <input type="time" id="heure_depart" name="heure_depart" required>
        </div>
        <div class="form-group-new">
            <i class="fas fa-clock fa-2x"></i>
            <label for="heure_arrivee">Heure d'arrivée</label>
            <input type="time" id="heure_arrivee" name="heure_arrivee" required>
        </div>
        <div class="form-group-new">
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
        <div class="form-group-new">
            <button class="main-btn1-new">Proposer</button>
        </div>
    </form>
</div>
</div>

<?php include 'config/footer.inc.php'; ?>
