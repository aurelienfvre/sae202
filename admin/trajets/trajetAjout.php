<!DOCTYPE html>
<html>
<head>
	<title>DailyDrivers - Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="container">
		<a href="trajetGestion.php">Retour</a> 	
		<hr>
		<h1>Gestion des Trajets</h1>
		<p>Ajouter ici un trajet</p>
		<hr>
		<form action="trajetAjoutVerif.php" method="POST" enctype="multipart/form-data">
		    <label for="date">Date de départ</label>
            <input type="date" id="date" name="date" required>
		    <label for="lieu_depart">Lieu de départ:</label>
		    <input type="text" name="lieu_depart" id="lieu_depart" required>
		    <label for="lieu_arrivee">Lieu d'arrivée:</label>
		    <input type="text" name="lieu_arrivee" id="lieu_arrivee" required>
            <label for="heure_depart" >Heure de départ</label>
            <input type="time" id="heure_depart" name="heure_depart" required>
            <label for="heure_arrivee">Heure d'arrivée</label>
            <input type="time" id="heure_arrivee" name="heure_arrivee" required>
		    <label for="nb_places">Nombre de places:</label>
		    <input type="number" name="nb_places" id="nb_places" required>
		    <label for="id_conducteur">ID du conducteur:</label>
		    <input type="number" name="id_conducteur" id="id_conducteur" required>

		    <input type="submit" name="ajouter" value="Ajouter">
		</form>
	</div>
</body>
</html>
