<!DOCTYPE html>
<html>
<head>
	<title>SoleHype - Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
	<div class="container">
		<a href="parkingGestion.php">Retour</a> 	
		<hr>
		<h1>Gestion de nos Parkings</h1>
		<p>Ajouter ici un Parking</p>
		<hr>
		<form action="parkingAjoutVerif.php" method="POST" enctype="multipart/form-data">
		    <label for="nom">Nom du Parking:</label>
		    <input type="text" name="nom" id="nom" required>
			<label for="adresse">Adresse:</label>
	    <input type="text" name="adresse" id="adresse" required>
	    
	    <label for="ville">Ville:</label>
	    <input type="text" name="ville" id="ville" required>
	    
	    <input type="submit" name="ajouter" value="Ajouter">
	</form>
</div>
</body>
</html>
