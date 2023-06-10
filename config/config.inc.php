<?php
// Paramètres de connexion à la base de données
$hostname = 'localhost';
$dbname = 'sae202';
$username = 'sae202User';
$password = 'Dailydrivers';
$charset = 'utf8';

try {
    $mabd = new PDO("mysql:host=$hostname;dbname=$dbname;charset=$charset", $username, $password);
    $mabd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $mabd->exec('SET NAMES utf8;');
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>