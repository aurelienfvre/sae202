<?php
session_start();
include 'config/config.inc.php';
include 'config/fonctions.inc.php';
include 'config/header.inc.php';

echo '<h1>Trajets disponibles</h1>';

// Vérifie si tous les champs ont été remplis
if (empty($_POST['depart']) || empty($_POST['arrivee']) || empty($_POST['date']) || empty($_POST['places'])) {
    // Enregistrez le message d'erreur dans une variable de session
    $_SESSION['erreur'] = "Veuillez remplir tous les champs";

    // Redirigez l'utilisateur vers le formulaire
    header("Location: reserverTrajet.php");
    exit;
}

$depart = strtolower($_POST['depart']);
$arrive = strtolower($_POST['arrivee']);
$datedepart = $_POST['date'];
$places = $_POST['places'];

// On utilise les caractères '%' autour des paramètres pour obtenir une recherche flexible
// On a également modifié la requête pour permettre de chercher des trajets avec une date de départ supérieure ou égale à la date entrée, et un nombre de places suffisant.
$req = $mabd->prepare('SELECT * FROM trajets WHERE LOWER(lieu_depart) LIKE ? AND LOWER(lieu_arrivee) LIKE ? AND date_heure >= ? AND nb_places >= ? ORDER BY date_heure ASC');
$req->execute(['%'.$depart.'%', '%'.$arrive.'%', $datedepart, $places]);

$resultat = $req->fetchAll();

if (count($resultat) == 0) {
    echo "<p>Aucun résultat trouvé.</p>";
} else {
    foreach ($resultat as $ligne) {
        echo '<div class="tripBox">
        <div class="tripDetails">
            <div class="departureCity"><p>'.$ligne['lieu_depart'].'</p></div>
            <div class="tripLine">
                <div class="startPoint"></div>
                <div class="line"></div>
                <div class="endPoint"></div>
            </div>
            <div class="arrivalCity"><p>'.$ligne['lieu_arrivee'].'</p></div>
        </div>
        <div class="smallDetails">
            <div class="smallCity"><p>'.$ligne['lieu_depart'].'</p></div>
            <div class="smallCity"><p>'.$ligne['lieu_arrivee'].'</p></div>
        </div>
        <div class="timeDetails">
            <div class="departureDetails">
                <p>Départ le: '.$ligne['date_heure'].'</p>
                <p>À '.$ligne['heure_depart'].'</p>
            </div>
            <div class="arrivalDetails">
                <p>Arrivée à: '.$ligne['heure_arrivee'].'</p>
                <p>Places disponibles: '.$ligne['nb_places'].'</p>
            </div>
        </div>
        <form action="reserverTrajet.php" method="post">
            <input type="hidden" name="trajet_id" value="'.$ligne['trajet_id'].'">
            <input type="hidden" name="utilisateur_id" value="'. $_SESSION['user']['utilisateur_id'] .'">
            <input id="submitBtn" type="submit" value="Réserver">
            <br>    
        </form>
    </div>';
    }
}

include 'config/footer.inc.php';
?>
