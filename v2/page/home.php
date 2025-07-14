
<?php
    session_start();
    require("../inc/connexion.php");
    require("../inc/function.php");

    $id = $_SESSION['idm'];
    $n = $_SESSION['names'];

    $bd = connectionbd();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../assets/home.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <form action="traitefiltre.php" method="post">
        <p>Filtrer par categorie: </p>
        <?php choixCategorie($bd);?>
        <input type="submit" value="Valider">
   </form>
   <h1>Bienvenue a l'accueil</h1>
   <?php
   if(!isset($_GET['idc']))
   {
       listeObjets($bd, $id);
   }
   else
   {
    $idc = $_GET['idc'];
    listeObjetsparCategorie($bd, $id, $idc);
   } 
   ?>
</body>
</html>

