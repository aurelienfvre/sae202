<?php 
session_start();
include 'config/config.inc.php';
include 'config/fonctions.inc.php';
include 'config/header.inc.php'; 

?>

<?php
$date=$_POST['date'];
$heure_depart=$_POST['heure_depart'];
$heure_arrivee=$_POST['heure_arrivee'];
$lieu_depart=$_POST['lieu_depart'];
$lieu_arrivee=$_POST['lieu_arrivee'];
$nb_places=$_POST['nb_places'];
$id_conducteur=$_POST['id_conducteur'];
$num=$_POST['num'];

include 'config/config.inc.php';

$req = "UPDATE trajets SET date_heure='$date', heure_depart='$heure_depart', heure_arrivee='$heure_arrivee', lieu_depart='$lieu_depart', lieu_arrivee='$lieu_arrivee', nb_places=$nb_places, id_conducteur=$id_conducteur WHERE trajet_id = $num";

$resultat = $mabd->query($req);

?>

<h2>Modification réussie</h2>
<?php header("refresh:1;url=trajetUtilisateur.php"); ?>
</body>
</html>
