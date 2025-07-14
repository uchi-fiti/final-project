<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <title>Fiche</title>
</head>
<body>
    <h1 style="style: text-align: center;">Fiche d'un objet</h1>
    <?php 
    require("../inc/connexion.php");
    require("../inc/function.php");
    $bd = connectionbd();
    $ido = $_GET['ido'];
    ficheObjet($bd, $ido);
    ?>
    
</body>
</html>