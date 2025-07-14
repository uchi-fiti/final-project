<?php 
    require("../inc/connexion.php");
    require("../inc/function.php");

    $bd = connectionbd();
    $ido = $_POST['idobjet'];
    $duration = $_POST['duration'];
    emprunter($bd, $ido, $duration);
    header("Location: home.php");
?>