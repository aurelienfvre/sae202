<?php
session_start();
include 'config/config.inc.php';
include 'config/fonctions.inc.php';
include 'config/header.inc.php';

echo '<h1>Trajets disponibles</h1>';

// Vérifie si tous les champs ont été remplis
if (empty($_POST['depart']) || empty($_POST['arrivee']) || empty($_POST['date']) || empty($_POST['places'])) {
    // Enregistrez le message d'erreur dans une variable de session
    $_SESSION['erreur'] = "Veuillez remplir tous les champs";

    // Redirigez l'utilisateur vers le formulaire
    header("Location: reserverTrajet.php");
    exit;
}

$depart = strtolower($_POST['depart']);
$arrive = strtolower($_POST['arrivee']);
$datedepart = $_POST['date'];
$places = $_POST['places'];

// On utilise les caractères '%' autour des paramètres pour obtenir une recherche flexible
// On a également modifié la requête pour permettre de chercher des trajets avec une date de départ supérieure ou égale à la date entrée, et un nombre de places suffisant.
$req = $mabd->prepare('SELECT * FROM trajets WHERE LOWER(lieu_depart) LIKE ? AND LOWER(lieu_arrivee) LIKE ? AND date_heure >= ? AND nb_places >= ? ORDER BY date_heure ASC');
$req->execute(['%'.$depart.'%', '%'.$arrive.'%', $datedepart, $places]);

$resultat = $req->fetchAll();

if (count($resultat) == 0) {
    echo "<p>Aucun résultat trouvé.</p>";
} else {
    foreach ($resultat as $ligne) {
    echo '<div>';
    echo '<p>Ville de départ: '.$ligne['lieu_depart'].'</p>';
    echo '<p>Ville d\'arrivée: '.$ligne['lieu_arrivee'].'</p>';
    echo '<p>Date de départ: '.$ligne['date_heure'].'</p>';
    echo '<p>Places disponibles: '.$ligne['nb_places'].'</p>';
    // Inclure l'ID du trajet dans le lien de réservation
    echo '<a href="reserverTrajet.php?id='.$ligne['id'].'">Réserver</a>';
    echo '</div><hr>';
}

}

include 'config/footer.inc.php';
?>
