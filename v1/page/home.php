
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
</head>
<body>
   <h1>Bienvenue a l'accueil</h1>
</body>
</html>

