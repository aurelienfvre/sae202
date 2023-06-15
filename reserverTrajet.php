<?php
session_start();
include 'config/config.inc.php';
include 'config/fonctions.inc.php';
include 'config/header.inc.php';

echo '<h1>Réserver un trajet</h1>';

// Vérifiez si un ID de trajet a été passé
if (!isset($_GET['id']) || empty($_GET['id'])) {
    $_SESSION['erreur'] = "Aucun trajet sélectionné";

    header("Location: rechercherTrajet.php");
    exit;
}

$trajetId = $_GET['id'];

// Récupérez les détails du trajet à partir de l'ID
$req = $mabd->prepare('SELECT * FROM trajets WHERE id = ?');
$req->execute([$trajetId]);

$resultat = $req->fetch();

if (!$resultat) {
    echo "<p>Aucun résultat trouvé.</p>";
} else {
    echo '<div>';
    echo '<p>Ville de départ: '.$resultat['lieu_depart'].'</p>';
    echo '<p>Ville d\'arrivée: '.$resultat['lieu_arrivee'].'</p>';
    echo '<p>Date de départ: '.$resultat['date_heure'].'</p>';
    echo '<p>Places disponibles: '.$resultat['nb_places'].'</p>';

    echo '<form action="confirmerReservation.php" method="POST">
            <input type="hidden" name="trajetId" value="'.$trajetId.'"/>
            <label for="places">Nombre de places à réserver :</label>
            <input type="number" id="places" name="places" min="1" max="'.$resultat['nb_places'].'"/>
            <input type="submit" value="Confirmer la réservation"/>
          </form>';
    echo '</div>';
}

include 'config/footer.inc.php';
?>
