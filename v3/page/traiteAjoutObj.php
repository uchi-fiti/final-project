    <?php
    session_start();
    require("../inc/connexion.php");
    require("../inc/function.php");

    $bd = connectionbd();
    $nomObj = $_POST['nomObjet'];
    $id = $_POST['idm'];
    $idcat = $_POST['categorie'];
    $request = "insert into fp_objet (nom_objet, id_categorie, id_membre) values ('%s', %d, %d);";
    $request = sprintf($request, $nomObj, $idcat, $id);
    mysqli_query($bd, $request);
    $idobj = idObjet($bd, $nomObj, $id, $idcat);

    $uploadDir = "../assets/img/";
    $maxSize = 2 * 1024 * 1024; // 2 Mo
    $allowedMimeTypes = ['image/jpeg', 'image/png', 'application/pdf'];
    if ($_FILES['fichier']['error'] === UPLOAD_ERR_NO_FILE) {
        header("Location:./home.php");
    }
    // Vérifie si un fichier est soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fichier'])) {
    $file = $_FILES['fichier'];
    if ($file['error'] !== UPLOAD_ERR_OK) {
    die('Erreur lors de l’upload : ' . $file['error']);
    }
    // Vérifie la taille
    if ($file['size'] > $maxSize) {
    die('Le fichier est trop volumineux.');

    }
    // Vérifie le type MIME avec `finfo`
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);
    if (!in_array($mime, $allowedMimeTypes)) {
    die('Type de fichier non autorisé : ' . $mime);
    }
    // renommer le fichier
    $originalName = pathinfo($file['name'], PATHINFO_FILENAME);
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $newName = $originalName . '_' . uniqid() . '.' . $extension;
    // Déplace le fichier
    if (move_uploaded_file($file['tmp_name'], $uploadDir . $newName)) {
    echo "Fichier uploadé avec succès : ". $newName;
    $request1 = "insert into fp_images_objet (id_objet, nom_image) values (%d, '%s');";
    $request1 =sprintf($request1, $idobj, $newName);
    mysqli_query($bd, $request1);
    } else {
    echo "Échec du déplacement du fichier.";
    }
    } else {
    echo "Aucun fichier reçu.";
    }

    header("Location:home.php");
?>