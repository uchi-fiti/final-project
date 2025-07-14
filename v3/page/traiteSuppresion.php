<?php
    require("../inc/connexion.php");
    $id = $_POST['idObj'];
    $request = "delete from fp_images_objet where id_objet = %d limit 1";
    $request = sprintf($request, $id);
    mysqli_query(connectionbd(), $request);
    header("Location:home.php");

?>