<!DOCTYPE html>
<html>
<head>
	<title>DailyDrivers - Admin</title>
</head>
<body>
<a href="usagerGestion.php">Retour</a> 
	<hr>
<h1>Gestion des utilisateurs</h1>
<h2>Vous venez de modifier un utilisateur</h2>
<hr>

<?php
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$email=$_POST['email'];
$type_utilisateur=$_POST['type_utilisateur'];
$vehicule_nom=$_POST['vehicule_nom'];
$num=$_POST['num'];

include '../../config/config.inc.php';

$req = "UPDATE utilisateurs SET nom='$nom', prenom='$prenom', email='$email', type_utilisateur='$type_utilisateur', vehicule_nom='$vehicule_nom' WHERE utilisateur_id = $num";

$resultat = $mabd->query($req);

?>

<h2>Modification réussie</h2>
</body>
</html>
