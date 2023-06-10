<?php 
session_start();
include(__DIR__.'/config/config.inc.php');
include(__DIR__.'/config/header.inc.php');
include(__DIR__.'/config/menu.inc.php');

?>

<?php if(isset($_SESSION['flash'])): ?>
<p style="color: red;"><?php echo $_SESSION['flash']; ?></p>
<?php unset($_SESSION['flash']); endif; ?>

<form method="post" action="validFormInscription.php">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom">

    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom">

    <label for="email">Email :</label>
    <input type="email" id="email" name="email">

    <label for="mot_de_passe">Mot de passe :</label>
    <input type="password" id="mot_de_passe" name="mot_de_passe">

    <label for="type_utilisateur">Type d'utilisateur :</label>
    <select id="type_utilisateur" name="type_utilisateur">
        <option value="conducteur">Conducteur</option>
        <option value="passager">Passager</option>
        <option value="les deux">Les deux</option>
    </select>

    <input type="submit" value="Inscription">
</form>
