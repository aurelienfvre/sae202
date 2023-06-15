<?php

function deconnexionBDD($mabd) {
    // Fermer la connexion à la base de données
    $mabd = null;
}

function deconnexionCompte() {
    $_SESSION = array();
    session_destroy();
}
?>

