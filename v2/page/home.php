
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
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <form action="traitefiltre.php" method="post">
        <h3>Filtrer par categorie: </h3>
        <?php choixCategorie($bd);?>
        <button type="submit" class="btn btn-primary">Valider</button>
   </form>
   <h1 style="text-align: center;">Liste des objets</h1>
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
   </br></br>
   <a href="ajouterObjet.php"><button>Ajouter un objet a votre liste</button></a>
</body>
</html>

