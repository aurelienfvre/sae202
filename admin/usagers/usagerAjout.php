<!DOCTYPE html>
<html>
<head>
	<title>DailyDrivers - Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
	<div class="container">
		<a href="usagerGestion.php">Retour</a> 	
		<hr>
		<h1>Gestion des utilisateurs</h1>
		<p>Ajouter ici un utilisateur</p>
		<hr>
		<form action="usagerAjoutVerif.php" method="POST" enctype="multipart/form-data">
		    <label for="nom">Nom de l'utilisateur:</label>
		    <input type="text" name="nom" id="nom" required>
		    <label for="prenom">Prénom de l'utilisateur:</label>
		    <input type="text" name="prenom" id="prenom" required>
		    <label for="email">Email de l'utilisateur:</label>
		    <input type="email" name="email" id="email" required>
		    <label for="mot_de_passe">Mot de passe:</label>
		    <input type="password" name="mot_de_passe" id="mot_de_passe" required>
		    <label for="type_utilisateur">Type d'utilisateur:</label>
		    <select name="type_utilisateur" id="type_utilisateur">
		    	<option value="conducteur">Conducteur</option>
		    	<option value="passager">Passager</option>
		    	<option value="les deux">Les deux</option>
		    </select>
		    <label for="vehicule_nom">Nom du véhicule:</label>
		    <input type="text" name="vehicule_nom" id="vehicule_nom">

		    <input type="submit" name="ajouter" value="Ajouter">
		</form>
	</div>
</body>
</html>
