<?php
session_start();
require 'config/config.inc.php';
$_SESSION = array();
session_destroy();
header('location: index.php');
?>