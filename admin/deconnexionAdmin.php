<?php
require '../config/config.inc.php';
$_SESSION=array();
session_destroy();
header('location: formConnexionAdmin.php');
?>