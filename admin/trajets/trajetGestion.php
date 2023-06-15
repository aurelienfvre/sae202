<!DOCTYPE html>
<html>
<head>
	<title>DailyDrivers-Admin</title>
</head>
<body>
	<a href="../indexAdmin.php">Retour</a>
	<hr>
	<h1>Gestion des Trajets</h1>
    <hr>
	<a href="trajetAjout.php">Ajouter un Trajet</a>
    <div>
      <table id="trajet">
		<tbody>
			<?php
			// Connexion à la base de données
            include '../../config/config.inc.php';
			$req = "SELECT * FROM trajets";
			$resultat = $mabd->query($req);

			echo '<div class="card-container">';
            foreach ($resultat as $ligne) {
                echo '<div class="card">
                    <div class="trajet_details">
                        <p>Date et heure: '.$ligne['date_heure'].'</p>
                        <p>Lieu de départ: '.$ligne['lieu_depart'].'</p>
                        <p>Lieu d\'arrivée: '.$ligne['lieu_arrivee'].'</p>
                        <p>Nombre de places: '.$ligne['nb_places'].'</p>
                        <p>ID du conducteur: '.$ligne['id_conducteur'].'</p>
                        <p>Heure de départ: '.$ligne['heure_depart'].'</p>
                        <p>Heure d\'arrivée: '.$ligne['heure_arrivee'].'</p>
                    </div>
                    <div class="card-actions">
                        <a href="trajetDelete.php?num='.$ligne['trajet_id'].'">Supprimer</a>
                        <a href="trajetUpdate.php?num='.$ligne['trajet_id'].'">Modifier</a>
                    </div>
                </div>';
            }
            echo '</div>';
            ?>

		</tbody>
	</table>
    </body>
    </html>
