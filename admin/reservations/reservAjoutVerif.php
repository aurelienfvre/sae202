<!DOCTYPE html>
<html>
<head>
    <title>DailyDrivers - Admin</title>
</head>
<body>
    <a href="reservGestion.php">Retour au tableau de bord</a>
    <h1>Gestion des réservations</h1>
    <h2>Vous venez d'ajouter une réservation</h2>
    <?php
        $utilisateur_id = $_POST['utilisateur_id'];
        $trajet_id = $_POST['trajet_id'];
        include '../../config/config.inc.php';

        // Vérification de l'existence de l'utilisateur dans la table utilisateurs
        $verif_req = "SELECT * FROM utilisateurs WHERE utilisateur_id = $utilisateur_id";
        $verif_res = $mabd->query($verif_req);
    
        // Vérification de l'existence du trajet dans la table trajets
        $verif_req_trajet = "SELECT * FROM trajets WHERE trajet_id = $trajet_id";
        $verif_res_trajet = $mabd->query($verif_req_trajet);
    
        if ($verif_res->rowCount() > 0 && $verif_res_trajet->rowCount() > 0) {
            // Si l'utilisateur et le trajet existent, alors insérer la nouvelle réservation
            $req = "INSERT INTO reservations (utilisateur_id, trajet_id) VALUES ($utilisateur_id, $trajet_id)";
            $resultat = $mabd->query($req);
            echo "<h2>Réservation ajoutée avec succès.</h2>";
        } else {
            echo "<h2>L'ID de l'utilisateur ou l'ID du trajet est incorrect. Veuillez réessayer avec des ID valides.</h2>";
        }
    ?>
</body>
</html>    