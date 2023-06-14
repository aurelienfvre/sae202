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


function parking($mabd){
    $req = "SELECT * FROM Parking";
    try {
        $resultat = $mabd->query($req);
        $lignes_resultat = $resultat->rowCount();
        if ($lignes_resultat > 0) {
        while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){
            echo '<div class="card">
                        <div>
                            <iframe src="'.$ligne['photo_parking'].'" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div>
                        '.$ligne['nom_parking'].'
                        </div>
                        <div>Localisation exacte :'.$ligne['emplacement_parking'].'</div>
                </div>';
        }
     }else {
        echo '<p>Pas de résultat</p>';
     }
    } catch (PDOException $e){
        echo '<p>Erreur : '.$e->getMessage().'</p>';
        die();
    }
}

function deconnexionBDD($mabd) {
    // Fermer la connexion à la base de données
    $mabd = null;
}
?>