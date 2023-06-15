<!DOCTYPE html>
<html>
<head>
    <title>DailyDrivers - Admin</title>
</head>
<body>
<a href="trajetGestion.php">Retour</a> 
    <hr>
<h1>Gestion des trajets</h1>
<h2>Vous venez de modifier un trajet</h2>
<hr>

<?php
$date=$_POST['date'];
$heure_depart=$_POST['heure_depart'];
$heure_arrivee=$_POST['heure_arrivee'];
$lieu_depart=$_POST['lieu_depart'];
$lieu_arrivee=$_POST['lieu_arrivee'];
$nb_places=$_POST['nb_places'];
$id_conducteur=$_POST['id_conducteur'];
$num=$_POST['num'];

include '../../config/config.inc.php';

$req = "UPDATE trajets SET date_heure='$date', heure_depart='$heure_depart', heure_arrivee='$heure_arrivee', lieu_depart='$lieu_depart', lieu_arrivee='$lieu_arrivee', nb_places=$nb_places, id_conducteur=$id_conducteur WHERE trajet_id = $num";

$resultat = $mabd->query($req);

?>

<h2>Modification réussie</h2>
</body>
</html>
