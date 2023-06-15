<?php
session_start();
include 'config/config.inc.php';
include 'config/fonctions.inc.php';
include 'config/header.inc.php';
?>
<main>
    <h1>Mes Trajets</h1>

    <?php
    $req = "SELECT * FROM reservations INNER JOIN trajets ON reservations.trajet_id = trajets.trajet_id WHERE reservations.utilisateur_id = '" . $_SESSION['id_usager'] . "'";
    $resultat = $mabd->query($req)->fetchAll(PDO::FETCH_ASSOC);

    echo '<p>Trajets Réservés :</p>';

    if (count($resultat) > 0) {
        foreach ($resultat as $ligne) {
            echo '<div class="bb">' . $ligne['trajet_id'] .
                '<div>' . $ligne['lieu_depart'] . '</div>' .
                '<div>' . $ligne['lieu_arrivee'] . '</div>' .
                '<div>' . $ligne['date_heure'] . '</div>' .
                '<div>' . $ligne['heure_depart'] . '</div>' .
                '<div>' . $ligne['heure_arrivee'] . '</div>' .
                '<div>' . $ligne['nb_places'] . '</div>' .
                '<div class="boutons">' .
                '<a href="trajetDelete.php?num=' . $ligne['trajet_id'] . '">Supprimer</a>' .
                '</div></div>';
        }
    } else {
        echo '<p>Aucun trajet réservé.</p>';
    }
    ?>

    <?php
    $req = "SELECT * FROM trajets WHERE id_conducteur = '" . $_SESSION['id_usager'] . "'";
    $resultat = $mabd->query($req)->fetchAll(PDO::FETCH_ASSOC);

    echo '<p>Trajets Proposés :</p>';

    if (count($resultat) > 0) {
        foreach ($resultat as $ligne) {
            echo '<div class="bb">' . $ligne['trajet_id'] .
                '<div>' . $ligne['lieu_depart'] . '</div>' .
                '<div>' . $ligne['lieu_arrivee'] . '</div>' .
                '<div>' . $ligne['date_heure'] . '</div>' .
                '<div>' . $ligne['heure_depart'] . '</div>' .
                '<div>' . $ligne['heure_arrivee'] . '</div>' .
                '<div>' . $ligne['nb_places'] . '</div>' .
                '<div class="boutons">' .
                '<a href="trajetDelete.php?num=' . $ligne['trajet_id'] . '">Supprimer</a>';

?>
<main>
    <h1>Mes Trajets</h1>

    <?php
    $req = "SELECT * FROM reservations INNER JOIN trajets ON reservations.trajet_id = trajets.trajet_id WHERE reservations.utilisateur_id = '" . $_SESSION['utilisateur_id'] . "'";
    $resultat = $mabd->query($req)->fetchAll(PDO::FETCH_ASSOC);

    echo '<p>Trajets Réservés :</p>';

    if (count($resultat) > 0) {
        foreach ($resultat as $ligne) {
            echo '<div class="bb">' . $ligne['trajet_id'] .
                '<div>' . $ligne['lieu_depart'] . '</div>' .
                '<div>' . $ligne['lieu_arrivee'] . '</div>' .
                '<div>' . $ligne['date_heure'] . '</div>' .
                '<div>' . $ligne['heure_depart'] . '</div>' .
                '<div>' . $ligne['heure_arrivee'] . '</div>' .
                '<div>' . $ligne['nb_places'] . '</div>' .
                '<div class="boutons">' .
                '<a href="trajetDelete.php?num=' . $ligne['trajet_id'] . '">Supprimer</a>' .
                '</div></div>';
        }
    } else {
        echo '<p>Aucun trajet réservé.</p>';
    }

    $req = "SELECT * FROM trajets WHERE id_conducteur = '" . $_SESSION['utilisateur_id'] . "'";
    $resultat = $mabd->query($req)->fetchAll(PDO::FETCH_ASSOC);

    echo '<p>Trajets Proposés :</p>';

    if (count($resultat) > 0) {
        foreach ($resultat as $ligne) {
            echo '<div class="bb">' . $ligne['trajet_id'] .
                '<div>' . $ligne['lieu_depart'] . '</div>' .
                '<div>' . $ligne['lieu_arrivee'] . '</div>' .
                '<div>' . $ligne['date_heure'] . '</div>' .
                '<div>' . $ligne['heure_depart'] . '</div>' .
                '<div>' . $ligne['heure_arrivee'] . '</div>' .
                '<div>' . $ligne['nb_places'] . '</div>' .
                '<div class="boutons">' .
                '<a href="trajetDelete.php?num=' . $ligne['trajet_id'] . '">Supprimer</a>' .
                '<a href="trajetUpdate.php?num=' . $ligne['trajet_id'] . '">Modifier</a>' .
                '</div></div>';
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