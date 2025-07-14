
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="../assets/css/inscription.css">
</head>
<body>
    <h1 style="text-align: center;s">Page d'inscription</h1>
    <form action="traiteinscription.php" method = "post">
    <p>Anaranao</p>
    <input type = "text" name = "nom">
    <p>Nahaterahanao</p>
    <input type = "date" name = "daty">
    <p>Votre genre:</p>
    <select name="genre">
        <option value="M">Male</option>
        <option value="F">Female</option>
    </select>
    <p>Mail anlah</p>
    <input type = "email" name = "mail">
    <p>Votre ville: </p>
    <input type="text" name="ville" id="">
    <p>Mot de passe anao</p>
    <input type = "text" name = "mdpp">
    <input type = "submit" value = "Valider">
    </form>
</body>
</html>