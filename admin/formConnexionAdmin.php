<?php include '../config/config.inc.php'; ?>
<?php include '../config/fonctions.inc.php'; ?>
<head>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css"> <!-- Assurez-vous d'avoir un fichier CSS correctement lié -->
</head>

<div class="login-page-container">
  <div class="form-container1">
    <form method="post" action="verifFormConnexionAdmin.php">

        <label for="nom_admin">Pseudo Admin :</label>
        <input type="text" id="nom_admin" name="nom_admin">

        <label for="mot_de_passe_admin">Mot de passe :</label>
        <input type="password" id="mot_de_passe_admin" name="mot_de_passe_admin">

      <input type="submit" value="Connexion">      
    </form>
  </div>
</div>

<?php if (isset($_GET['erreur'])): ?>
<p>Erreur : Pseudo Admin ou mot de passe incorrect.</p>
<?php endif; ?>
