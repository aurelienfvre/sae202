<?php 
session_start();
include(__DIR__.'/config/config.inc.php');
include(__DIR__.'/config/header.inc.php');
include(__DIR__.'/config/fonctions.inc.php');
?>

<?php if(isset($_SESSION['flash'])): ?>
<p style="color: red;"><?php echo $_SESSION['flash']; ?></p>
<?php unset($_SESSION['flash']); endif; ?>

<div class="login-page-container">
  <div class="form-container2">
    <form method="post" action="validFormInscription.php">
        <div class="row">
            <div class="half-width">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" placeholder="Doe" required="">
            </div>
            <div class="half-width">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" placeholder="John" required="">
            </div>
        </div>
        
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" placeholder="nom@domaine.fr" required="">

        <div class="row">
            <div class="half-width">
                <label for="mot_de_passe">Mot de passe :</label>
                <input type="password" id="mot_de_passe" name="mot_de_passe"placeholder="Mot de passe" required="">
            </div>
            <div class="half-width">
                <label for="type_utilisateur">Type d'utilisateur :</label>
                <select id="type_utilisateur" name="type_utilisateur">
                    <option value="conducteur">Conducteur</option>
                    <option value="passager">Passager</option>
                    <option value="les deux">Les deux</option>
                </select>
            </div>
        </div>

        <div class="row" style="display: none;" id="vehicule_nom">
            <div class="half-width">
                <label for="vehicule_nom">Nom du véhicule :</label>
                <input type="text" id="vehicule_nom" name="vehicule_nom" placeholder="Audi A3">
            </div>
        </div>

        
        <input type="submit" value="Inscription">

        <div class="register-container">
        <p>Vous avez déjà un compte?</p>
        <p><a href="formConnexion.php">Connectez-vous !</a></p>
    </div>
    </form>
  </div>
</div>

<script>
window.onload = function() {
    var typeUtilisateur = document.getElementById('type_utilisateur');
    var vehiculeNom = document.getElementById('vehicule_nom');

    typeUtilisateur.addEventListener('change', function() {
        if (this.value == 'conducteur' || this.value == 'les deux') {
            vehiculeNom.style.display = 'block';
        } else {
            vehiculeNom.style.display = 'none';
        }
    });

    // Initialise l'affichage lors du chargement de la page
    typeUtilisateur.dispatchEvent(new Event('change'));
}
</script>

<?php include(__DIR__.'/config/footer.inc.php'); ?>
