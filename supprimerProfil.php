<?php
session_start();
include 'config/config.inc.php';
include 'config/fonctions.inc.php';
include 'config/header.inc.php';

$id = $_SESSION['user']['utilisateur_id']; // Récupérer l'identifiant de l'utilisateur

$req = "DELETE FROM utilisateurs WHERE utilisateur_id = '" . $id . "'";
$resultat = $mabd->query($req);

echo '<p>Vous venez de supprimer votre compte ' . $id . '</p>';
deconnexionCompte();
header("refresh:2;url=formInscription.php");
exit;
?>
