<!DOCTYPE html>
<html>
<head>
    <title>DailyDrivers - Admin</title>
</head>
<body>
    <a href="trajetGestion.php">Retour au tableau de bord</a>
    <h1>Gestion des trajets</h1>
    <h2>Vous venez d'ajouter un trajet</h2>
    <?php
        $date = $_POST['date'];
        $heure_depart = $_POST['heure_depart'];
        $heure_arrivee = $_POST['heure_arrivee'];
        $lieu_depart = $_POST['lieu_depart'];
        $lieu_arrivee = $_POST['lieu_arrivee'];
        $nb_places = $_POST['nb_places'];
        $id_conducteur = $_POST['id_conducteur'];

        include '../../config/config.inc.php';

        // Vérification de l'existence de l'id_conducteur dans la table utilisateurs
        $verif_req = "SELECT * FROM utilisateurs WHERE utilisateur_id = $id_conducteur";
        $verif_res = $mabd->query($verif_req);

        if($verif_res->rowCount() > 0) {
            // Si l'id_conducteur existe, alors insérer le nouveau trajet
            $req = "INSERT INTO trajets (date_heure, lieu_depart, lieu_arrivee, nb_places, id_conducteur, heure_depart, heure_arrivee) VALUES ('$date', '$lieu_depart', '$lieu_arrivee', $nb_places, $id_conducteur, '$heure_depart', '$heure_arrivee')";
            $resultat = $mabd->query($req);
            echo "<h2>Trajet ajouté avec succès.</h2>";
        } else {
            echo "<h2>L'ID du conducteur ne correspond à aucun utilisateur. Veuillez réessayer avec un ID de conducteur valide.</h2>";
        }
    ?>
</body>
</html>
