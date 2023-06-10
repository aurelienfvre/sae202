<?php
include '../config/config.inc.php';
include '../config/fonctions.inc.php';

// Vérifier si le formulaire a été soumis
if (isset($_POST['nom_admin']) && isset($_POST['mot_de_passe_admin'])) {
    $nom_admin = $_POST['nom_admin'];
    $mot_de_passe_admin = $_POST['mot_de_passe_admin'];

    // Préparer la requête SQL pour rechercher l'administrateur
    $req = $mabd->prepare("SELECT * FROM admins WHERE username = :username");
    $req->execute(['username' => $nom_admin]);
    $admin = $req->fetch();

    if ($admin && password_verify($mot_de_passe_admin, $admin['password'])) {
        // Le mot de passe est correct. Vous pouvez maintenant démarrer une session pour l'administrateur
        session_start();
        $_SESSION['admin_id'] = $admin['admin_id'];
        deconnexionBDD($mabd);  // Déconnectez-vous de la base de données avant de rediriger
        header("Location: indexAdmin.php");
        exit();
    } else {
        // Le mot de passe est incorrect. Rediriger vers le formulaire de connexion avec un message d'erreur
        deconnexionBDD($mabd);  // Déconnectez-vous de la base de données avant de rediriger
        header("Location: formConnexionAdmin.php?erreur=1");
        exit();
    }
} else {
    // Le formulaire n'a pas été soumis. Rediriger vers le formulaire de connexion
    deconnexionBDD($mabd);  // Cette ligne est atteinte seulement si le formulaire n'a pas été soumis
    header("Location: formConnexionAdmin.php");
    exit();
}
?>
