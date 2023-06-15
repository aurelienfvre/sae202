<?php
// recupérer dans l'url l'id du trajet à supprimer
$num=$_GET['num'];

include '../../config/config.inc.php';

// On récupère d'abord les informations du trajet à supprimer pour pouvoir les afficher
$req = "SELECT * FROM trajets WHERE trajet_id = $num";
$resultat = $mabd->query($req);
$trajet = $resultat->fetch();

// Ensuite, on supprime le trajet de la base de données
$req = 'DELETE FROM trajets WHERE trajet_id='.$num; 
$resultat = $mabd->query($req);

// Maintenant, on peut afficher l'id du trajet et le lieu de départ (ou toute autre information que vous voulez)
echo '<h2>Vous venez de supprimer le trajet avec l\'ID '. $trajet['trajet_id'] . ' partant de '. $trajet['lieu_depart'] . '</h2>'; 


header("refresh:2;url=trajetUtilisateur.php");
?>

</body>
</html>
