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

    // Préparer la requête SQL pour mettre à jour l'utilisateur
    $req = $mabd->prepare("UPDATE utilisateurs SET nom=:nom, prenom=:prenom, email=:email, mot_de_passe=:hashed_password, type_utilisateur=:type_utilisateur WHERE utilisateur_id=:utilisateur_id");
    $resultat = $req->execute([
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'hashed_password' => $mot_de_passe,
        'type_utilisateur' => $type_utilisateur,
        'utilisateur_id' => $user['utilisateur_id'],
    ]);

    if($resultat) {
        $_SESSION['user'] = [
            'utilisateur_id' => $_SESSION['user']['utilisateur_id'],
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'type_utilisateur' => $type_utilisateur,
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

<form method="post">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" value="<?php echo $user['nom']; ?>">

    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" value="<?php echo $user['prenom']; ?>">

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>">

    <label for="mot_de_passe">Mot de passe :</label>
    <input type="password" id="mot_de_passe" name="mot_de_passe">

    <label for="type_utilisateur">Type d'utilisateur :</label>
    <select id="type_utilisateur" name="type_utilisateur">
        <option value="conducteur" <?php echo $user['type_utilisateur'] == 'conducteur' ? 'selected' : ''; ?>>Conducteur</option>
        <option value="passager" <?php echo $user['type_utilisateur'] == 'passager' ? 'selected' : ''; ?>>Passager</option>
        <option value="les deux" <?php echo $user['type_utilisateur'] == 'les deux' ? 'selected' : ''; ?>>Les deux</option>
    </select>

    <input type="submit" value="Mettre à jour">
</form>
