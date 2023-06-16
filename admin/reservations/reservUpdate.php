<!DOCTYPE html>
<html>
<head>
    <title>DailyDrivers - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container">
        <a href="reservGestion.php">Retour</a>    
        <hr>
        <h1>Gestion des Réservations</h1>
        <p>Modifier ici une réservation</p>
        <hr>
        <?php
            $num = $_GET['num'];
            include '../../config/config.inc.php';
            $req = 'SELECT * FROM reservations WHERE reservation_id = '.$num;
            $resultat = $mabd->query($req);
            $reservation = $resultat->fetch();
        ?>
        <hr>
        <form action="reservUpdateVerif.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="num" value="<?php echo $reservation['reservation_id'] ?>">
            
            <label for="utilisateur_id">ID de l'utilisateur:</label>
            <input type="number" name="utilisateur_id" id="utilisateur_id" value="<?php echo $reservation['utilisateur_id'] ?>" required>
            
            <label for="trajet_id">ID du trajet:</label>
            <input type="number" name="trajet_id" id="trajet_id" value="<?php echo $reservation['trajet_id'] ?>" required>

            <input type="submit" value="Modifier">
        </form>
    </div>
</body>
</html>
