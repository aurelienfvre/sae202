<!DOCTYPE html>
<html>
<head>
    <title>DailyDrivers - Admin</title>
</head>
<body>
    <a href="reservGestion.php">Retour</a> 
    <hr>
    <h1>Gestion des réservations</h1>
    <h2>Vous venez de modifier une réservation</h2>
    <hr>

    <?php
    $utilisateur_id = $_POST['utilisateur_id'];
    $trajet_id = $_POST['trajet_id'];
    $num = $_POST['num'];

    include '../../config/config.inc.php';

    $req = "UPDATE reservations SET utilisateur_id = $utilisateur_id, trajet_id = $trajet_id WHERE reservation_id = $num";
    $resultat = $mabd->query($req);
    ?>

    <h2>Modification réussie</h2>
</body>
</html>
