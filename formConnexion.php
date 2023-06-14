<?php 
session_start();
include(__DIR__.'/config/config.inc.php');
include(__DIR__.'/config/header.inc.php');
include(__DIR__.'/config/fonctions.inc.php');
?>

<div class="login-page-container">
  <div class="form-container1">
    <form method="post" action="verifFormConnexion.php">
      <label for="email">Email :</label>
      <input type="email" id="email" name="email" placeholder="nom@domaine.fr" required="">

      <label for="mot_de_passe">Mot de passe :</label>
      <input type="password" id="mot_de_passe" name="mot_de_passe" placeholder="Mot de passe" required="">

      <input type="submit" value="Connexion">

    <div class="register-container">
        <p>Vous n'avez pas de compte?</p>
        <p><a href="formInscription.php">Inscrivez-vous !</a></p>
    </div>

      
    </form>
  </div>
</div>

<?php include(__DIR__.'/config/footer.inc.php'); ?>
<?php
if(isset($_SESSION['error_message'])) {
    echo '<p style="color: red;">' . $_SESSION['error_message'] . '</p>';
    unset($_SESSION['error_message']); // pour ne pas afficher le message d'erreur une fois qu'il a été affiché
}
?>
