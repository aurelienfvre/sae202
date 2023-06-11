<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>DailyDrivers</title>
</head>
<header>
    <div class="navbar">
        <div class="navbar-left">
            <a href="../index.php">
                <img src="assets/imgs/logo.svg" alt="Logo">
            </a>
            <nav>
                <ul>
                    <li><a href="../index.php"><i class="fas fa-home"></i> Accueil</a></li>
                    <li><a href="#"><i class="fas fa-map-pin"></i> Parking</a></li>
                    <li><a href="../formContact.php"><i class="fas fa-envelope"></i> Contact</a></li>
                </ul>
            </nav>
        </div>
        <?php
// Vérifier si l'utilisateur est connecté
if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    // L'utilisateur est connecté, afficher le bouton du profil
    echo '<div class="navbar-right">
            <nav>
                <ul>
                    <li>
                        <a href="modifProfil.php" class="border-btn">Profil</a>
                        <a href="deconnexion.php" class="border-btn">Déconnexion</a>
                    </li>
                </ul>
            </nav>
        </div>';
} else {
    // L'utilisateur n'est pas connecté, inclure le menu de connexion/inscription
    include 'menu.inc.php';
}
?>
    </div>
</header>
