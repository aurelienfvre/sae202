<?php
    session_start();
    include 'config/config.inc.php';
    include 'config/fonctions.inc.php';
    include 'config/header.inc.php';
?>
<body>
    <div class="container-trajet">
        <?php
            $num = $_GET['num'];
            include 'config/config.inc.php';
            $req = 'SELECT * FROM trajets WHERE trajet_id = '.$num;
            $resultat = $mabd->query($req);
            $trajet = $resultat->fetch();
        ?>
        <hr>
        <form action="trajetUpdateVerif.php" method="POST" enctype="multipart/form-data" class="update-form-trajet">
            <input type="hidden" name="num" value="<?php echo $trajet['trajet_id'] ?>">
            
            <label for="date" class="form-label-trajet">Date:</label>
            <input type="date" name="date" id="date" value="<?php echo $trajet['date_heure'] ?>" required class="form-input-trajet">
            
            <label for="heure_depart" class="form-label-trajet">Heure de départ:</label>
            <input type="time" name="heure_depart" id="heure_depart" value="<?php echo $trajet['heure_depart'] ?>" required class="form-input-trajet">

            <label for="heure_arrivee" class="form-label-trajet">Heure d'arrivée:</label>
            <input type="time" name="heure_arrivee" id="heure_arrivee" value="<?php echo $trajet['heure_arrivee'] ?>" required class="form-input-trajet">

            <label for="lieu_depart" class="form-label-trajet">Lieu de départ:</label>
            <input type="text" name="lieu_depart" id="lieu_depart" value="<?php echo $trajet['lieu_depart'] ?>" required class="form-input-trajet">

            <label for="lieu_arrivee" class="form-label-trajet">Lieu d'arrivée:</label>
            <input type="text" name="lieu_arrivee" id="lieu_arrivee" value="<?php echo $trajet['lieu_arrivee'] ?>" required class="form-input-trajet">

            <label for="nb_places" class="form-label-trajet">Nombre de places:</label>
            <input type="number" name="nb_places" id="nb_places" value="<?php echo $trajet['nb_places'] ?>" min="1" max="4" required class="form-input-trajet">

            <label for="id_conducteur" class="form-label-trajet">ID du conducteur:</label>
            <input type="number" name="id_conducteur" id="id_conducteur" value="<?php echo $trajet['id_conducteur'] ?>" required class="form-input-trajet">

            <input type="submit" value="Modifier" class="submit-btn-trajet">
        </form>
    </div>
<?php
    include 'config/footer.inc.php';
    
?>

</body>
</html>
