<!DOCTYPE html>
<html>
<head>
	<title>DailyDrivers - Admin</title>
</head>
<body>
<a href="parkingGestion.php">Retour</a> 
	<hr>
<h1>Gestion de nos Parkings</h1>
<h2>Vous venez de modifier un de nos Parkings</h2>
<hr>

<?php
$nom=$_POST['nom'];
$adresse=$_POST['adresse'];
$num=$_POST['num'];

include '../../config/config.inc.php';

$req = "UPDATE parkings SET nom='$nom', iframe_parking='$adresse' WHERE parking_id = $num";

// echo 'juste pour le debug: '. $req;
$resultat = $mabd->query($req);

?>

<h2>Modification réussie</h2>
</tbody>
</table>
</body>
</html>