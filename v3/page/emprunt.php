<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emprunt</title>
</head>
<body>
    <form action="traiteemprunt.php" action="post">
        <p>Entrez la duree de l'emprunt</p>
        <input type="number" name="duration">
        <input type="hidden" name="idobjet" value="<?php echo $_POST['idObj'];?>">
        <input type="submit" value="Valider">
    </form>
</body>
</html>