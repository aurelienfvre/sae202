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
               <th>Iframe</th>
            </tr>
         </thead>
		<tbody>
			<?php
			// Connexion à la base de données
            include '../../config/config.inc.php';
			$req = "SELECT * FROM parkings";
			$resultat = $mabd->query($req);

			echo '<div class="card-container">';
			foreach ($resultat as $ligne) {
				echo '<div class="card">
					<div class="parking_name">
						'.$ligne['nom'].'
						<div class="card-actions">
							<a href="parkingDelete.php?num='.$ligne['parking_id'].'">Supprimer</a>
							<a href="parkingUpdate.php?num='.$ligne['parking_id'].'">Modifier</a>
						</div>
					</div>
					<div class="map">
						<iframe src="'.$ligne['iframe_parking'].'" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>   
				</div>';
			}
			echo '</div>';
        

			
			?>
		</tbody>
	</table>
    </body>
    </html>