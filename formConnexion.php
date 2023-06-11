<?php 
session_start();
include(__DIR__.'/config/config.inc.php');
include(__DIR__.'/config/header.inc.php');
include(__DIR__.'/config/fonctions.inc.php');

?>

<form method="post" action="verifFormConnexion.php">
    <label for="email">Email :</label>
    <input type="email" id="email" name="email">

    <label for="mot_de_passe">Mot de passe :</label>
    <input type="password" id="mot_de_passe" name="mot_de_passe">

    <input type="submit" value="Connexion">
</form>

<?php
if(isset($_SESSION['error_message'])) {
    echo '<p style="color: red;">' . $_SESSION['error_message'] . '</p>';
    unset($_SESSION['error_message']); // pour ne pas afficher le message d'erreur une fois qu'il a été affiché
}
?>
