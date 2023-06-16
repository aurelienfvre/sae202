<?php
    session_start();
    include 'config/config.inc.php';
    include 'config/fonctions.inc.php';
    include 'config/header.inc.php';

    if (!isset($_SESSION['user']) || !isset($_SESSION['user']['utilisateur_id'])) {
        header("Location: formConnexion.php");
        exit();
    }
    ?>

    <main class="main-content1">
        <h1 class="main-title1">Mes Trajets</h1>

        <?php
        $req = "SELECT * FROM reservations INNER JOIN trajets ON reservations.trajet_id = trajets.trajet_id WHERE reservations.utilisateur_id = '" . $_SESSION['user']['utilisateur_id'] . "'";
        $resultat = $mabd->query($req)->fetchAll(PDO::FETCH_ASSOC);

        echo '<div class="section-title">Trajets Réservés :</div>';

        if (count($resultat) > 0) {
            foreach ($resultat as $ligne) {
                echo '<div class="reservation">' .
                    '<div class="reservation-details">' .
                    '<div class="departureCity">' . $ligne['lieu_depart'] . '</div>' .
                    '<div class="arrivalCity">' . $ligne['lieu_arrivee'] . '</div>' .
                    '</div>' .
                    '<div class="reservation-line">' .
                    '<div class="reservation-startPoint"></div>' .
                    '<div class="reservation-line"></div>' .
                    '<div class="reservation-endPoint"></div>' .
                    '</div>' .
                    '<div class="reservation-smallDetails">' .
                    '<div>' . $ligne['date_heure'] . '</div>' .
                    '<div>' . $ligne['heure_depart'] . '</div>' .
                    '<div>' . $ligne['heure_arrivee'] . '</div>' .
                    '<div>' . $ligne['nb_places'] . '</div>' .
                    '</div>' .
                    '<div class="reservation-buttons">' .
                    '<a href="reservationDelete.php?num=' . $ligne['trajet_id'] . '">Supprimer</a>' .
                    '</div>' .
                    '</div>';
            }
        } else {
            echo '<p>Aucun trajet réservé.</p>';
        }


        $req = "SELECT * FROM trajets WHERE id_conducteur = '" . $_SESSION['user']['utilisateur_id'] . "'";
        $resultat = $mabd->query($req)->fetchAll(PDO::FETCH_ASSOC);

        echo '<div class="section-title">Trajets Proposés :</div>';

        if (count($resultat) > 0) {
            foreach ($resultat as $ligne) {
                echo '<div class="proposedTrip">' .
                    '<div class="proposedTrip-details">' .
                    '<div class="departureCity">' . $ligne['lieu_depart'] . '</div>' .
                    '<div class="arrivalCity">' . $ligne['lieu_arrivee'] . '</div>' .
                    '</div>' .
                    '<div class="proposedTrip-line">' .
                    '<div class="proposedTrip-startPoint"></div>' .
                    '<div class="proposedTrip-line"></div>' .
                    '<div class="proposedTrip-endPoint"></div>' .
                    '</div>' .
                    '<div class="proposedTrip-smallDetails">' .
                    '<div>' . $ligne['date_heure'] . '</div>' .
                    '<div>' . $ligne['heure_depart'] . '</div>' .
                    '<div>' . $ligne['heure_arrivee'] . '</div>' .
                    '<div>' . $ligne['nb_places'] . '</div>' .
                    '</div>' .
                    '<div class="proposedTrip-buttons">' .
                    '<a href="trajetDelete.php?num=' . $ligne['trajet_id'] . '">Supprimer</a>' .
                    '<a href="trajetUpdate.php?num=' . $ligne['trajet_id'] . '">Modifier</a>' .
                    '</div>' .
                    '</div>';
            }
        } else {
            echo '<p>Aucun trajet proposé.</p>';
        }

        ?>

        <form action="proposerTrajet.php" method="post" enctype="multipart/form-data">
            <input id="env" type="submit" value="Proposer">
        </form>
    </main>

    <?php include 'config/footer.inc.php'; ?>