<!DOCTYPE html>
<html>
<head>
	<title>DailyDrivers-Admin</title>
	<!-- Liens vers les fichiers CSS de Bootstrap -->
    <link rel="stylesheet" type ="text/css" href="../../assets/css/">
</head>
<body>
	<a href="../indexAdmin.php">Retour</a>
	<hr>
	<h1>Gestion des Parkings</h1>
    <hr>
	<a href="parkingAjout.php">Ajouter un Parkings</a>
    <div>
      <table id="parking">
         <thead>
            <tr>
               <th>Nom</th>
               <th>Adresse</th>
               <th>Ville</th>
            </tr>
         </thead>
		<tbody>
			<?php
			// Connexion à la base de données
            include '../../config/config.inc.php';
			$req = "SELECT * FROM parkings";
			$resultat = $mabd->query($req);

			foreach ($resultat as $value) {
			    echo '<tr>' ;
			    echo '<td>'.$value['nom'] . '</td>';
			    echo '<td>'.$value['adresse'] . '</td>';
			    echo '<td>'.$value['ville'] . '</td>';
			    echo '<td>
			            <a href="parkingDelete.php?num='.$value['parking_id'].'">Supprimer</a>
			            <a href="parkingUpdate.php?num='.$value['parking_id'].'">Modifier</a>
			          </td>';

			    echo '</tr>';
			}
			?>
		</tbody>
	</table>
    </body>
    </html>