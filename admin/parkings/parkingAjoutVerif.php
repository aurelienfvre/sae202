<!DOCTYPE html>
<html>
<head>
	<title>DailyDrivers - Admin</title>
</head>
<body>
<a href="parkingGestion.php">retour au tableau de bord</a>
<h1>Gestion de nos Parkings</h1>
<h2>Vous venez d'ajouter un Parking</h2>
<?php
$nom=$_POST['nom'];
$adresse=$_POST['adresse'];


include '../../config/config.inc.php';

$req = "INSERT INTO parkings (nom, iframe_parking) VALUES ('$nom', '$adresse')";
$resultat = $mabd->query($req);

?>
</tbody>
</table>
</body>
</html>