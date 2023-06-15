<!DOCTYPE html>
<html>
<head>
    <title>DailyDrivers - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="container">
		<a href="parkingGestion.php">Retour</a> 	
		<hr>
		<h1>Gestion de nos Parkings</h1>
		<p>Modifier ici nos Parkings</p>
        	<hr>
            <?php
			$num = $_GET['num'];
			include '../../config/config.inc.php';
			$req = 'SELECT * FROM parkings WHERE parking_id = '.$num;
			$resultat = $mabd->query($req);
			$parking = $resultat->fetch(); // dans le club on a les infos 
		?>
        	<hr>
	<form action="parkingUpdateVerif.php" method="POST" enctype="multipart/form-data">
	    <input type="hidden" name="num" value="<?php echo $parking['parking_id'] ?>">
	    
	    <label for="nom">Nom:</label>
	    <input type="text" name="nom" id="nom" value="<?php echo $parking['nom'] ?>" required>
	    
	    <label for="adresse">Iframe:</label>
	    <input type="text" name="adresse" id="adresse" value="<?php echo $parking['iframe_parking'] ?>">
	    
	    <input type="submit" value="Modifier">
	</form>
</div>
</body>
</html>