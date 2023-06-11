<?php
include 'config/config.inc.php';
include 'config/fonctions.inc.php';

// Récupérer les données du formulaire
$email = $_POST['email'];
$mot_de_passe = $_POST['mot_de_passe'];

// Préparer la requête SQL pour obtenir l'utilisateur par l'email
$req = $mabd->prepare("SELECT * FROM utilisateurs WHERE email = :email");

$req->execute([
    'email' => $email,
]);

$user = $req->fetch(PDO::FETCH_ASSOC);

// Si l'utilisateur est trouvé et le mot de passe est correct, démarrer une session
if($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
    session_start();
    $_SESSION['user'] = $user;
    header('Location: index.php');
    exit;
} else {
    session_start();
    $_SESSION['error_message'] = "Erreur : L'email ou le mot de passe est incorrect.";
    header('Location: formConnexion.php');
    exit;
}
?>
