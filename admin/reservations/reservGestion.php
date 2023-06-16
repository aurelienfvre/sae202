<!DOCTYPE html>
<html>
<head>
	<title>DailyDrivers-Admin</title>
</head>
<body>
	<a href="../indexAdmin.php">Retour</a>
	<hr>
	<h1>Gestion des Réservations</h1>
    <hr>
	<a href="reservAjout.php">Ajouter une Réservation</a>
    <div>
      <table id="reservation">
		<tbody>
			<?php
			// Connexion à la base de données
            include '../../config/config.inc.php';
			$req = "SELECT * FROM reservations";
			$resultat = $mabd->query($req);
            echo '<div class="card-container">';
            foreach ($resultat as $ligne) {
                echo '<div class="card">
                    <div class="reservation_details">
                        <p>Réservation ID: '.$ligne['reservation_id'].'</p>
                        <p>Utilisateur ID: '.$ligne['utilisateur_id'].'</p>
                        <p>Trajet ID: '.$ligne['trajet_id'].'</p>
                    </div>
                    <div class="card-actions">
                        <a href="reservDelete.php?num='.$ligne['reservation_id'].'">Supprimer</a>
                        <a href="reservUpdate.php?num='.$ligne['reservation_id'].'">Modifier</a>
                    </div>
                </div>';
            }
            echo '</div>';
            ?>
    
        </tbody>
    </table>
    </body>
    </html>
    