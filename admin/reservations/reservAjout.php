<!DOCTYPE html>
<html>
<head>
	<title>DailyDrivers - Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="container">
		<a href="reservationGestion.php">Retour</a> 	
		<hr>
		<h1>Gestion des Réservations</h1>
		<p>Ajouter ici une réservation</p>
		<hr>
		<form action="reservAjoutVerif.php" method="POST" enctype="multipart/form-data">
		    <label for="utilisateur_id">ID de l'utilisateur:</label>
		    <input type="number" name="utilisateur_id" id="utilisateur_id" required>
		    <label for="trajet_id">ID du trajet:</label>
		    <input type="number" name="trajet_id" id="trajet_id" required>
            <input type="submit" name="ajouter" value="Ajouter">
	</form>
</div>
</body>
</html>