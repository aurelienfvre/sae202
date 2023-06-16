<head>
    <title>DailyDrivers - Admin</title>
</head>
<body>
    <a href="reservGestion.php">Retour</a>
    <hr>
    <h1>Gestion des Réservations</h1>
    <?php
// récupérer dans l'url l'id de la réservation à supprimer
$reservation_id = $_GET['num'];

include '../../config/config.inc.php';

// On récupère d'abord les informations de la réservation à supprimer pour pouvoir les afficher
$req = "SELECT * FROM reservations WHERE reservation_id = $reservation_id";
$resultat = $mabd->query($req);
$reservation = $resultat->fetch();

// Ensuite, on supprime la réservation de la base de données
$req = 'DELETE FROM reservations WHERE reservation_id='.$reservation_id; 
$resultat = $mabd->query($req);

// Maintenant, on peut afficher l'id de la réservation et d'autres informations si nécessaire
echo '<h2>Vous venez de supprimer la réservation avec l\'ID '. $reservation['reservation_id'] . '</h2>'; 

?>


</body>
</html>