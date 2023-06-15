<head>
    <title>DailyDrivers - Admin</title>
</head>
<body>
	<a href="usagerGestion.php">Retour</a>
    <hr>
	<h1>Gestion des Usagers</h1>
<?php
// recupérer dans l'url l'id de l'album à supprimer
$num=$_GET['num'];

include '../../config/config.inc.php';

// tapez ici la requete de suppression de l'album dont l'id est passé dans l'url
$req = 'DELETE FROM utilisateurs WHERE utilisateur_id='.$num; 

// cette ligne sert juste pour le debug. à supprimer quand tout marche correctement  
 
$resultat = $mabd->query($req);
///je veux qu'on affiche le nom de la sneakers et son id mais je ne sais pas comment faire
echo '<h2>Vous venez de supprimer l\'utilisateur '. $num.'</h2>'; 

?>

</body>
</html>