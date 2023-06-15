<?php
session_start();
include 'config/config.inc.php';
include 'config/fonctions.inc.php';
include 'config/header.inc.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['trajet_id']) && isset($_SESSION['user'])) {
        $trajetId = $_POST['trajet_id'];
        $idUtilisateur = $_SESSION['user']['utilisateur_id'];

        $req = 'INSERT INTO reservations (trajet_id, utilisateur_id) VALUES (:trajet_id, :utilisateur_id)';
        $stmt = $mabd->prepare($req);
        $stmt->bindParam(':trajet_id', $trajetId);
        $stmt->bindParam(':utilisateur_id', $idUtilisateur);

        if ($stmt->execute()) {
            echo "<h1>Réservation réussie</h1>";
            echo "<p>Votre trajet a été réservé avec succès.</p>";
        } else {
            echo "<h1>Erreur de réservation</h1>";
            echo "<p>Une erreur s'est produite lors de la réservation du trajet.</p>";
        }
    } else {
        echo "<h1>Erreur de réservation</h1>";
        echo "<p>Une erreur s'est produite lors de la réservation du trajet.</p>";
    }
}
header("refresh:2;url=trajetUtilisateur.php");
exit;

?>
