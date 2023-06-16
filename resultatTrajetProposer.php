<?php 
session_start();
include 'config/config.inc.php';
include 'config/fonctions.inc.php';
include 'config/header.inc.php';

if (!isset($_SESSION['user'])) {
    header("Location: formConnexion.php"); 
    exit;
}

$depart = $_POST['depart'];
$arrive = $_POST['arrivee'];
$datedepart = $_POST['date'];
$places = $_POST['places'];
$heure_depart = $_POST['heure_depart'];
$heure_arrivee = $_POST['heure_arrivee'];
$id_conducteur = $_SESSION['user']['utilisateur_id']; // On utilise 'utilisateur_id' au lieu de 'id'

$req = 'INSERT INTO trajets (lieu_depart, lieu_arrivee, date_heure, nb_places, id_conducteur, heure_depart, heure_arrivee) VALUES (?, ?, ?, ?, ?, ?, ?)';

$stmt= $mabd->prepare($req);
$resultat = $stmt->execute([$depart, $arrive, $datedepart, $places, $id_conducteur, $heure_depart, $heure_arrivee]);

if ($resultat) {
    echo "<p>Le trajet a été proposé avec succès.</p>";
} else {
    echo "<p>Il y a eu une erreur lors de la proposition du trajet. Veuillez réessayer.</p>";
}

include 'config/footer.inc.php';
header("refresh:2;url=trajetUtilisateur.php");
exit;
?>
