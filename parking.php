<?php
session_start();
include 'config/config.inc.php';
include 'config/fonctions.inc.php';
include 'config/header.inc.php';

//je veux un truc à afficher pour test si ça fonctionne la page

?>
<?php

$req = "SELECT * FROM parkings";
    try {
        $resultat = $mabd->query($req);
        $lignes_resultat = $resultat->rowCount();
        if ($lignes_resultat > 0) {
        while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){

            echo '<div class="card-container">';
            foreach ($resultat as $ligne) {
                echo '<div class="card">
                    <div class="parking_name">
                        '.$ligne['nom'].'
                    </div>
                    <div class="map">
                        <iframe src="'.$ligne['iframe_parking'].'" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>   
                </div>';
            }
            echo '</div>';
        }
     }else {
        echo '<p>Pas de résultat</p>';
     }
    } catch (PDOException $e){
        echo '<p>Erreur : '.$e->getMessage().'</p>';
        die();
    }
?>

<?php
include 'config/footer.inc.php';
?>