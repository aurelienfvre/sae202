<?php
session_start();
include 'config/config.inc.php';
include 'config/fonctions.inc.php';
include 'config/header.inc.php';


if(!isset($_SESSION['user'])) {
    header('Location: formConnexion.php');
    exit();
}

$user = $_SESSION['user'];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);  // Hacher le mot de passe
    $type_utilisateur = $_POST['type_utilisateur'];
    $vehicule_nom = $_POST['vehicule_nom'];

    // Préparer la requête SQL pour mettre à jour l'utilisateur
    $req = $mabd->prepare("UPDATE utilisateurs SET nom=:nom, prenom=:prenom, email=:email, mot_de_passe=:hashed_password, type_utilisateur=:type_utilisateur, vehicule_nom=:vehicule_nom WHERE utilisateur_id=:utilisateur_id");
    $resultat = $req->execute([
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'hashed_password' => $mot_de_passe,
        'type_utilisateur' => $type_utilisateur,
        'vehicule_nom' => $vehicule_nom,
        'utilisateur_id' => $user['utilisateur_id'],
    ]);

    if($resultat) {
        $_SESSION['user'] = [
            'utilisateur_id' => $_SESSION['user']['utilisateur_id'],
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'type_utilisateur' => $type_utilisateur,
            'vehicule_nom' => $vehicule_nom,
        ];
        $_SESSION['flash'] = "Profil mis à jour avec succès !";
        header('Location: modifProfil.php');
        exit();
    } else {
        echo "Erreur : La mise à jour du profil a échoué.";
    }
}
?>


<?php if(isset($_SESSION['flash'])): ?>
<p style="color: green;"><?php echo $_SESSION['flash']; ?></p>
<?php unset($_SESSION['flash']); endif; ?>

<div class="login-page-container">
  
<form id="profil-form" method="post">
    <div class="profil-field">
        <label for="nom">Nom :</label>
        <span id="nom-display" onclick="editField('nom');"><?php echo $user['nom']; ?></span>
        <input type="text" id="nom" name="nom" value="<?php echo $user['nom']; ?>" style="display: none;" onchange="saveField('nom');">
        <a href="#" class="edit-icon" onclick="toggleField('nom'); return false;">🖉</a>
    </div>

    <div class="profil-field">
        <label for="prenom">Prénom :</label>
        <span id="prenom-display" onclick="editField('prenom');"><?php echo $user['prenom']; ?></span>
        <input type="text" id="prenom" name="prenom" value="<?php echo $user['prenom']; ?>" style="display: none;" onchange="saveField('prenom');">
        <a href="#" class="edit-icon" onclick="toggleField('prenom'); return false;">🖉</a>
    </div>

    <div class="profil-field">
        <label for="email">Email :</label>
        <span id="email-display" onclick="editField('email');"><?php echo $user['email']; ?></span>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" style="display: none;" onchange="saveField('email');">
        <a href="#" class="edit-icon" onclick="toggleField('email'); return false;">🖉</a>
    </div>

    <div class="profil-field">
        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe">
        <a href="#" class="edit-icon" onclick="editField('mot_de_passe'); return false;">🖉</a>
    </div>

    <div class="profil-field">
        <label for="type_utilisateur">Type d'utilisateur :</label>
        <span id="type_utilisateur-display" onclick="editField('type_utilisateur');"><?php echo $user['type_utilisateur']; ?></span>
        <select id="type_utilisateur" name="type_utilisateur" style="display: none;" onchange="saveField('type_utilisateur');">
            <option value="conducteur" <?php echo $user['type_utilisateur'] == 'conducteur' ? 'selected' : ''; ?>>Conducteur</option>
            <option value="passager" <?php echo $user['type_utilisateur'] == 'passager' ? 'selected' : ''; ?>>Passager</option>
            <option value="les deux" <?php echo $user['type_utilisateur'] == 'les deux' ? 'selected' : ''; ?>>Les deux</option>
        </select>
        <a href="#" class="edit-icon" onclick="toggleField('type_utilisateur'); return false;">🖉</a>
    </div>

    <div class="profil-field" id="vehicule_nom_div" style="display: none;">
        <label for="vehicule_nom">Nom du véhicule :</label>
        <span id="vehicule_nom-display" onclick="editField('vehicule_nom');"><?php echo $user['vehicule_nom']; ?></span>
        <input type="text" id="vehicule_nom" name="vehicule_nom" value="<?php echo $user['vehicule_nom']; ?>" style="display: none;" onchange="saveField('vehicule_nom');">
        <a href="#" class="edit-icon" onclick="toggleField('vehicule_nom'); return false;">🖉</a>
    </div>

    <input type="submit" value="Mettre à jour" id="update-button" style="display: none;">
</form>
</div>

<script>
function toggleField(fieldName) {
    var displayElement = document.getElementById(fieldName + '-display');
    var inputElement = document.getElementById(fieldName);

    if (inputElement.style.display === '') {
        inputElement.style.display = 'none';
        displayElement.style.display = '';
    } else {
        displayElement.style.display = 'none';
        inputElement.style.display = '';
    }
}

function editField(fieldName) {
    var displayElement = document.getElementById(fieldName + '-display');
    var inputElement = document.getElementById(fieldName);

    if (inputElement.style.display === 'none') {
        toggleField(fieldName);
    }

    inputElement.focus();
}

function saveField(fieldName) {
    var displayElement = document.getElementById(fieldName + '-display');
    var inputElement = document.getElementById(fieldName);

    if (inputElement.style.display === '') {
        displayElement.innerText = inputElement.value;
        toggleField(fieldName);
    }
}

document.getElementById("type_utilisateur").addEventListener("change", function() {
  var type = this.value;
  var vehiculeDiv = document.getElementById('vehicule_nom_div');
  if(type == 'conducteur' || type == 'les deux') {
    vehiculeDiv.style.display = '';
  } else {
    vehiculeDiv.style.display = 'none';
  }
});

window.onload = function() {
  var type = document.getElementById('type_utilisateur').value;
  var vehiculeDiv = document.getElementById('vehicule_nom_div');
  if(type == 'conducteur' || type == 'les deux') {
    vehiculeDiv.style.display = '';
  } else {
    vehiculeDiv.style.display = 'none';
  }
}
</script>
<?php include(__DIR__.'/config/footer.inc.php'); ?>