<!DOCTYPE html>
<html>
<head>
    <title>DailyDrivers - Admin</title>
</head>
<body>
<a href="usagerGestion.php">retour au tableau de bord</a>
<h1>Gestion des utilisateurs</h1>
<h2>Vous venez d'ajouter un utilisateur</h2>
<?php
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$mot_de_passe = $_POST['mot_de_passe'];
$type_utilisateur = $_POST['type_utilisateur'];
$vehicule_nom = $_POST['vehicule_nom'];

include '../../config/config.inc.php';

$req = "INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, type_utilisateur, vehicule_nom) VALUES ('$nom', '$prenom', '$email', '$mot_de_passe', '$type_utilisateur', '$vehicule_nom')";
$resultat = $mabd->query($req);

?>
</tbody>
</table>
</body>
</html>
