<?php
    session_start();
    require("../inc/connexion.php");
    require("../inc/function.php");
    $id = $_SESSION['idm'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'objet</title>
    <link rel="stylesheet" href="../assets/css/inscription.css">
</head>
<body>
    <h1 style="text-align: center;s">Page d'ajout d'objets</h1>
    <form action="traiteAjoutObj.php" method = "post"  enctype="multipart/form-data">
    <p>Nom objet</p>
    <input type = "text" name="nomObjet">
    <p>Categorie</p>
    <?php choixCategorie(connectionbd()); ?>
    <input type="hidden" value = <?php echo $id;?> name="idm">
</br></br>
<p>Image</p>
<input type="file" name="fichier" id="fichier">
</br></br>
    <input type="submit" value="Confirmer">
    </form>
    <a href="home.php"><button>Retour a l'acceuil</button></a>
</body>
</html>