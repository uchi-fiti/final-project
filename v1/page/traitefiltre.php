<?php 
require("../inc/connexion.php");
require("../inc/function.php");
session_start();
$_SESSION['filtre'] = 1;
$idc = $_POST['categorie'];
header("Location: home.php?idc=$idc");
?>