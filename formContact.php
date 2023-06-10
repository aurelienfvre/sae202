<?php include 'config/config.inc.php'; ?>
<?php include 'config/fonctions.inc.php'; ?>
<?php include 'config/header.inc.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulaire de contact</title>
</head>
<body>
<h2>Formulaire de contact</h2>
<form action="verifFormContact.php" method="POST">
	<div id="en-tete">
		<div class="formulaire formulaire2">
			<label for="nom">Nom<span>*</span></label>
			<input type="text" id="nom" name="nom" required="">
		</div>

		<div class="formulaire formulaire2">
			<label for="prenom">Prénom <span>*</span></label>
			<input type="text" id="prenom" name="prenom" required="">
		</div>
	</div>

	<div class="formulaire">
		<label for="email">Email <span>*</span></label>
		<input type="email" id="email" name="email" placeholder="nom@domaine.fr" required="">
	</div>
	<div class="formulaire">
		<label for="message">Votre Message <span>*</span></label>
		<textarea name="message" id="message" cols="30" rows="10" placeholder="Votre message" required=""></textarea>
	</div>
	<input id="bouton" type="submit" value="Envoyer">        
</form>

</body>
</html>

