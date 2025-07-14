<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Document</title>
</head>
<body>

    <div class="banner">
    <h1>Connexion ou inscription</h1>
</div>
<div id="boite">
<?php session_start(); if(isset($_SESSION['v'])){?>
    <p color="red">Mauvais mail ou mot de passe</p>    
    <?php } session_destroy();?>
<form action="./traitelogin.php" method = "post">
    <p>Mail </p>
    <input type = "email" name = "mail">
    <p>Mot de passe anao</p>
    <input type = "password" name = "mdpp">
    <br><br>
    <input type = "submit" value = "Valider">
    </form>
    <p>Pas de compte ?</p>
    <a href="inscription.php">inscription</a>
    </div>
</body>
</html>