<?php
// récupérer dans l'url l'id du trajet dont les réservations doivent être supprimées
$trajet_id = $_GET['num'];

include 'config/config.inc.php';

// Préparez la requête pour obtenir les détails de la réservation
$stmt = $mabd->prepare("SELECT * FROM reservations WHERE trajet_id = :trajet_id");
$stmt->bindParam(':trajet_id', $trajet_id);
$stmt->execute();

$reservation = $stmt->fetch();

if ($reservation) {
    // La réservation existe, vous pouvez la supprimer
    $stmt = $mabd->prepare("DELETE FROM reservations WHERE trajet_id = :trajet_id");
    $stmt->bindParam(':trajet_id', $trajet_id);
    $stmt->execute();

    echo '<h2>Vous venez de supprimer les réservations associées au trajet avec l\'ID '. $trajet_id . '</h2>'; 
} else {
    // La réservation n'existe pas
    echo '<h2>Aucune réservation correspondante trouvée pour le trajet avec l\'ID ' . $trajet_id . '</h2>'; 
}

header("refresh:1;url=trajetUtilisateur.php");

?>
