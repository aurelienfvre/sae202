<!DOCTYPE html>
<html>
<head>
    <title>DailyDrivers - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container">
        <a href="trajetGestion.php">Retour</a>    
        <hr>
        <h1>Gestion des Trajets</h1>
        <p>Modifier ici un trajet</p>
        <hr>
        <?php
            $num = $_GET['num'];
            include '../../config/config.inc.php';
            $req = 'SELECT * FROM trajets WHERE trajet_id = '.$num;
            $resultat = $mabd->query($req);
            $trajet = $resultat->fetch();
        ?>
        <hr>
        <form action="trajetUpdateVerif.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="num" value="<?php echo $trajet['trajet_id'] ?>">
            
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" value="<?php echo $trajet['date_heure'] ?>" required>
            
            <label for="heure_depart">Heure de départ:</label>
            <input type="time" name="heure_depart" id="heure_depart" value="<?php echo $trajet['heure_depart'] ?>" required>

            <label for="heure_arrivee">Heure d'arrivée:</label>
            <input type="time" name="heure_arrivee" id="heure_arrivee" value="<?php echo $trajet['heure_arrivee'] ?>" required>

            <label for="lieu_depart">Lieu de départ:</label>
            <input type="text" name="lieu_depart" id="lieu_depart" value="<?php echo $trajet['lieu_depart'] ?>" required>

            <label for="lieu_arrivee">Lieu d'arrivée:</label>
            <input type="text" name="lieu_arrivee" id="lieu_arrivee" value="<?php echo $trajet['lieu_arrivee'] ?>" required>

            <label for="nb_places">Nombre de places:</label>
            <input type="number" name="nb_places" id="nb_places" value="<?php echo $trajet['nb_places'] ?>" required>

            <label for="id_conducteur">ID du conducteur:</label>
            <input type="number" name="id_conducteur" id="id_conducteur" value="<?php echo $trajet['id_conducteur'] ?>" required>

            <input type="submit" value="Modifier">
        </form>
    </div>
</body>
</html>
