<?php
session_start();
include 'config/config.inc.php';
include 'config/fonctions.inc.php';

// Vérifier si tous les champs ont été remplis
if (
    isset($_POST['nom']) && !empty($_POST['nom']) &&
    isset($_POST['prenom']) && !empty($_POST['prenom']) &&
    isset($_POST['email']) && !empty($_POST['email']) &&
    isset($_POST['mot_de_passe']) && !empty($_POST['mot_de_passe']) &&
    isset($_POST['type_utilisateur']) && !empty($_POST['type_utilisateur'])
) {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);  // Hacher le mot de passe
    $type_utilisateur = $_POST['type_utilisateur'];

    // Vérifier si l'email est déjà utilisé
    $req = $mabd->prepare("SELECT * FROM utilisateurs WHERE email = :email");
    $req->execute(['email' => $email]);
    $user = $req->fetch();

    if ($user) {
        // L'email est déjà utilisé
        $_SESSION['flash'] = "Cette adresse e-mail est déjà utilisée. Veuillez en choisir une autre.";
        header('Location: formInscription.php');
        exit();
    } else {
        // Préparer la requête SQL pour insérer un nouvel utilisateur
        $req = $mabd->prepare("INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, type_utilisateur) VALUES (:nom, :prenom, :email, :mot_de_passe, :type_utilisateur)");

        $resultat = $req->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'mot_de_passe' => $mot_de_passe,
            'type_utilisateur' => $type_utilisateur,
        ]);

        if($resultat) {
            // Si l'inscription a réussi, rediriger vers la page de connexion
            header('Location: formConnexion.php');
            exit();
        } else {
            // Si l'inscription a échoué, rediriger vers la page d'inscription
            $_SESSION['flash'] = "Une erreur est survenue lors de l'inscription. Veuillez réessayer.";
            header('Location: formInscription.php');
            exit();
        }
    }
} else {
    // Si tous les champs n'ont pas été remplis, rediriger vers la page d'inscription
    $_SESSION['flash'] = "Tous les champs sont obligatoires.";
    header('Location: formInscription.php');
    exit();
}
?>
