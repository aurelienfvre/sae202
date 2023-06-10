<?php
// Définissez ici les fonctions que vous utiliserez fréquemment dans votre code.
// Par exemple :
function verifierMotDePasse($motDePasse, $motDePasseBD) {
    // Comparer le mot de passe fourni avec celui stocké dans la base de données
    // Cela dépend de la façon dont vous stockez les mots de passe - si vous utilisez un hachage,
    // vous devrez utiliser une fonction comme password_verify().
    return password_verify($motDePasse, $motDePasseBD);
}
function verifierEmail($email) {
    // Vérifiez si l'adresse e-mail est valide
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function deconnexionBDD($mabd) {
    // Fermer la connexion à la base de données
    $mabd = null;
}
?>