<!DOCTYPE html>
<html>
<head>
	<title>DailyDrivers-Admin</title>
</head>
<body>
	<a href="../indexAdmin.php">Retour</a>
	<hr>
	<h1>Gestion des Usagers</h1>
    <hr>
	<a href="usagerAjout.php">Ajouter un Usager</a>
    <div>
      <table id="usager">
         
		<tbody>
			<?php
			// Connexion à la base de données
            include '../../config/config.inc.php';
			$req = "SELECT * FROM utilisateurs";
			$resultat = $mabd->query($req);

			echo '<div class="card-container">';
            foreach ($resultat as $ligne) {
                echo '<div class="card">
                    <div class="user_name">
                        '.$ligne['nom'].' '.$ligne['prenom'].'
                        
                    </div>
                    <div class="user_details">
                        <p>Email: '.$ligne['email'].'</p>
                        <p>Type d\'utilisateur: '.$ligne['type_utilisateur'].'</p>
                        <p>Nom du véhicule: '.$ligne['vehicule_nom'].'</p>
                    </div>
                    <div class="card-actions">
                        <a href="usagerDelete.php?num='.$ligne['utilisateur_id'].'">Supprimer</a>
                        <a href="usagerUpdate.php?num='.$ligne['utilisateur_id'].'">Modifier</a>
                    </div>
                </div>';
            }
            echo '</div>';
            ?>

		</tbody>
	</table>
    </body>
    </html>