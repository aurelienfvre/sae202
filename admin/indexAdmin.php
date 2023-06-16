<?php
session_start();
include '../config/config.inc.php';
include '../config/fonctions.inc.php';
include '../config/headerAdmin.inc.php';


// Calculer le nombre d'utilisateurs
$reqUtilisateurs = "SELECT COUNT(*) AS totalUtilisateurs FROM utilisateurs";
$resultatUtilisateurs = $mabd->query($reqUtilisateurs);
$nbUtilisateurs = $resultatUtilisateurs->fetch(PDO::FETCH_ASSOC)['totalUtilisateurs'];

// Calculer le nombre de réservations
$reqReservations = "SELECT COUNT(*) AS totalReservations FROM reservations";
$resultatReservations = $mabd->query($reqReservations);
$nbReservations = $resultatReservations->fetch(PDO::FETCH_ASSOC)['totalReservations'];

// Calculer le nombre de trajets
$reqTrajets = "SELECT COUNT(*) AS totalTrajets FROM trajets";
$resultatTrajets = $mabd->query($reqTrajets);
$nbTrajets = $resultatTrajets->fetch(PDO::FETCH_ASSOC)['totalTrajets'];
?>

<body>
    <div class="container">
        <h1>Statistiques du site</h1>
        <hr>
        <div class="stats-container">
            <div class="stat-box">
                <h2><?php echo $nbUtilisateurs; ?></h2>
                <p>Utilisateurs</p>
            </div>
            <div class="stat-box">
                <h2><?php echo $nbReservations; ?></h2>
                <p>Réservations</p>
            </div>
            <div class="stat-box">
                <h2><?php echo $nbTrajets; ?></h2>
                <p>Trajets</p>
            </div>
        </div>
    </div>
</body>
</html>
