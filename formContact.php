<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de contact</title>
    <link rel="stylesheet" type="text/css" href="path_to_your_css.css">
</head>
<body>
<?php include 'config/config.inc.php'; ?>
<?php include 'config/fonctions.inc.php'; ?>
<?php include 'config/header.inc.php'; ?>

<div class="contact-page-container">
    <div class="contact-form-container">
        <h2>Contactez nous</h2>
        <form action="verifFormContact.php" method="POST">
            <div class="contact-form-row">
                <div class="contact-form-group">
                    <label for="nom">Nom<span>*</span></label>
                    <input type="text" id="nom" name="nom" placeholder="Doe" required="">
                </div>

                <div class="contact-form-group">
                    <label for="prenom">Prénom <span>*</span></label>
                    <input type="text" id="prenom" name="prenom" placeholder="John" required="">
                </div>
            </div>

            <div class="contact-form-group">
                <label for="email">Email <span>*</span></label>
                <input type="email" id="email" name="email" placeholder="nom@domaine.fr" required="">
            </div>

            <div class="contact-form-group">
                <label for="message">Votre Message <span>*</span></label>
                <textarea name="message" id="message" cols="30" rows="10" placeholder="Votre message" required=""></textarea>
            </div>

            <div class="contact-form-group">
                <input id="bouton" type="submit" value="Envoyer">
            </div>
        </form>
    </div>
</div>

<?php include 'config/footer.inc.php'; ?>
</body>
</html>
