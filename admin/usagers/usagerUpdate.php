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
		<p>Modifier ici nos utilisateurs</p>
        	<hr>
            <?php
			$num = $_GET['num'];
			include '../../config/config.inc.php';
			$req = 'SELECT * FROM utilisateurs WHERE utilisateur_id = '.$num;
			$resultat = $mabd->query($req);
			$utilisateur = $resultat->fetch(); // dans le club on a les infos 
		?>
        	<hr>
	<form action="usagerUpdateVerif.php" method="POST" enctype="multipart/form-data">
	    <input type="hidden" name="num" value="<?php echo $utilisateur['utilisateur_id'] ?>">
	    
	    <label for="nom">Nom:</label>
	    <input type="text" name="nom" id="nom" value="<?php echo $utilisateur['nom'] ?>" required>
	    
	    <label for="prenom">Prénom:</label>
	    <input type="text" name="prenom" id="prenom" value="<?php echo $utilisateur['prenom'] ?>" required>

	    <label for="email">Email:</label>
	    <input type="email" name="email" id="email" value="<?php echo $utilisateur['email'] ?>" required>

	    <label for="type_utilisateur">Type d'utilisateur:</label>
	    <select name="type_utilisateur" id="type_utilisateur" value="<?php echo $utilisateur['type_utilisateur'] ?>" required>
            <option value="conducteur">Conducteur</option>
            <option value="passager">Passager</option>
            <option value="les deux">Les deux</option>
        </select>

        <label for="vehicule_nom">Nom du véhicule:</label>
	    <input type="text" name="vehicule_nom" id="vehicule_nom" value="<?php echo $utilisateur['vehicule_nom'] ?>" >

	    <input type="submit" value="Modifier">
	</form>
</div>
</body>
</html>
