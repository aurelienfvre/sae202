<?php
session_start();
include 'config/config.inc.php';
include 'config/fonctions.inc.php';
include 'config/header.inc.php';

echo '<h1>Trajet disponible</h1>';

// Vérifie si tous les champs ont été remplis
if (empty($_POST['depart']) || empty($_POST['arrivee']) || empty($_POST['date']) || empty($_POST['places'])) {
    // Enregistrez le message d'erreur dans une variable de session
    $_SESSION['erreur'] = "Veuillez remplir tous les champs";

    // Redirigez l'utilisateur vers le formulaire
    header("Location: reserverTrajet.php");
    exit;
}

$depart = $_POST['depart'];
$arrive = $_POST['arrivee'];
$datedepart = $_POST['date'];
$places = $_POST['places'];


$req = 'SELECT * FROM trajets WHERE lieu_depart = "'.$depart.'" AND lieu_arrivee = "'.$arrive.'" AND date_heure = "'.$datedepart.'" OR nb_places = "'.$places.'"';
$resultat = $mabd->query($req);

if ($resultat->rowCount() == 0) {
    echo "<p>Aucun résultat trouvé.</p>";
} else {
    foreach ($resultat as $ligne) {
        echo '<div>';
        echo '<p>Ville de départ: '.$ligne['lieu_depart'].'</p>';
        echo '<p>Ville d\'arrivée: '.$ligne['lieu_arrivee'].'</p>';
        echo '<p>Date de départ: '.$ligne['date_heure'].'</p>';
        echo '<p>Heure départ: '.$ligne['heure_depart'].'</p>';
        echo '<p>Heure arrivée: '.$ligne['heure_arrivee'].'</p>';
        echo '<p>Places disponibles: '.$ligne['nb_places'].'</p>';
        echo '<a href="reserverTrajet.php">Réserver</a>';
        echo '</div><hr>';
    }
}


include 'config/footer.inc.php';
?>