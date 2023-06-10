<?php
session_start();
include '../config/config.inc.php';
include '../config/fonctions.inc.php';
?>
<h1>Page d'administration</h1>

<!-- je veux des boutons pour avoir accès à la table parking,reservations,trajets,usagers -->
<a href="parkings/parkingGestion.php">Parking</a>
<a href="reservations/reservGestion.php">Réservations</a>
<a href="trajets/trajetsGestion.php">Trajets</a>
<a href="usagers/usagersGestion.php">Usagers</a>

<p><a href="deconnexionAdmin.php">Se déconnecter</a></p>