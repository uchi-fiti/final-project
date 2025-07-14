<?php

function tabLogin($bd, $email, $m){
    $requete = 'SELECT * from fp_membre where email = "%s" AND mdp = "%s";';
    $requete = sprintf($requete, $email, $m);
    echo $requete;
    $a = mysqli_query($bd, $requete);
    return $a;
 }

 function siExiste($bd, $email)
 {
    $request = 'SELECT * from fp_membre where email = "%s";';
    $request = sprintf($request, $email);
    $a = mysqli_query($bd, $request);
    if($b = mysqli_fetch_assoc($a))
    {
        return true;
    }
    else{
        return false;
    }
 }
 function Inscription($bd, $name, $andro, $gender, $email, $ville, $m)
 {
    $requete = 'INSERT INTO fp_membre (nom, date_naissance, genre, email, ville, mdp)VALUES ("%s" , "%s", "%s", "%s", "%s","%s");';
    $requete = sprintf($requete, $name, $andro, $gender, $email, $ville, $m);
    if(siExiste($bd, $email))
    {
        return 0;
    }
    if($a = mysqli_query($bd, $requete))
    {
        return 1;
    }
    else{
        return 0;
    }
 }
 function dateretour($bd, $id_objet, $idm)
{
    $request = "select * from fp_emprunt where id_objet = %d AND id_membre = %d and date_retour > now()";
    $request = sprintf($request , $id_objet, $idm);
    $query = mysqli_query($bd, $request);
    if($data = mysqli_fetch_assoc($query))
    {
        return $data['date_retour'];
    }
    return null;
}
 function listeObjets($bd, $idm)
 {
    $req = 'select * from fp_objet where id_membre = %d;';
    $req = sprintf($req, $idm);
    $a = mysqli_query($bd, $req);
?>

        <section class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
        <?php while($obj = mysqli_fetch_assoc($a)) {
            $dateRetour = dateretour($bd, $obj['id_objet'], $idm);
        ?>
            <article class="col">
                <a href="fiche.php?ido=<?php echo $obj['id_objet'];?>">
                <section class="card card-hover h-100 p-3">
                    <header>
                    <?php $nameImg = getImageObjet($bd, $obj['id_objet']);
                        $path = "../assets/img/".$nameImg; ?>
                        <img src=<?php echo $path ;?> alt="">
                        <h5 class="card-title mb-2">
                                <?php echo $obj['nom_objet']; ?>
                        </h5>
                    </header>
                    <p class="mb-1">
                        <strong>Emprunté:</strong>
                        <?= $dateRetour ? 'Oui' : 'Non' ?>
                    </p>
                    <p class="mb-0">
                        <strong>Date de retour:</strong>
                        <?= $dateRetour ?: '—' ?>
                    </p>
                    <form action="traiteSuppresion.php" method = "post">
                        <input type="submit" value="Supprimer cette image">
                        <input type="hidden" name="idObj" value = <?php echo $obj['id_objet']; ?>>
                    </form>
                </section>
                </a>
            </article>
            <?php } ?>
        </section>
    <?php
 }
 function choixCategorie($bd)
 {
    ?>
    <div class="mb-3">
        <select name="categorie" id="categorie" class="form-select-lg">
            <?php
            $request = "select * from fp_categorie_objet;";
            $query = mysqli_query($bd, $request);
            while ($data = mysqli_fetch_assoc($query)) {
                ?>
                <option value="<?php echo $data['id_categorie']; ?>">
                    <?php echo $data['nom_categorie']; ?>
                </option>
                <?php
            }
            ?>
        </select>
    </div>
            <?php
 }

 function listeObjetsparCategorie($bd, $idm, $idc)
 {
    $req = 'select * from fp_objet where id_membre = %d and id_categorie = %d;';
    $req = sprintf($req, $idm, $idc);
    $a = mysqli_query($bd, $req);
    ?>

        <section class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
        <?php while($obj = mysqli_fetch_assoc($a)) {
            $dateRetour = dateretour($bd, $obj['id_objet'], $idm);
        ?>
            <article class="col">
                <a href="fiche.php?ido=<?php echo $obj['id_objet'];?>">
                <section class="card card-hover h-100 p-3">
                    <header>
                        <?php $nameImg = getImageObjet($bd, $obj['id_objet']);
                        $path = "../assets/img/".$nameImg; ?>
                        <img src=<?php echo $path ;?> alt="">
                        <h5 class="card-title mb-2">
                                <?php echo $obj['nom_objet']; ?>
                        </h5>
                    </header>
                    <p class="mb-1">
                        <strong>Emprunté:</strong>
                        <?= $dateRetour ? 'Oui' : 'Non' ?>
                    </p>
                    <p class="mb-0">
                        <strong>Date de retour:</strong>
                        <?= $dateRetour ?: '—' ?>
                    </p>
                </section>
                </a>
            </article>
            <?php } ?>
        </section>
    <?php
 }
 function idObjet($bd, $nom, $id, $idcat)
 {
    $request = "select id_objet from fp_objet where nom_objet = '%s' and id_categorie = %d and id_membre = %d;";
    $request = sprintf($request, $nom, $idcat, $id);
    $query = mysqli_query($bd, $request);
    if($data = mysqli_fetch_assoc($query))
    {
        return $data['id_objet'];
    }
 }
 function getImageObjet($bd, $id)
 {
    $request = "select * from fp_images_objet where id_objet = %d";
    $request = sprintf($request, $id);
    $query = mysqli_query($bd, $request);
    if($data = mysqli_fetch_assoc($query))
    {
        return $data['nom_image'];
    }
    else
    {
        return "WorkingMan.jpg";
    }
 }
 function ficheObjet($bd, $ido)
{
    $req = 'select * from fp_objet as o
    join fp_membre as m on o.id_membre=m.id_membre
    join fp_categorie_objet as c on o.id_categorie=c.id_categorie
    where o.id_objet = %d;';
    $reqImg = 'select * from fp_images_objet where id_objet = %d;';
    $req = sprintf($req, $ido);
    $reqImg = sprintf($reqImg, $ido);
    $a = mysqli_query($bd, $req);
    $b = mysqli_query($bd, $reqImg);
    $imgprinc = true;

    echo '<div class="container mt-4">';
    echo '<div class="row justify-content-center">';
    echo '<div class="col-md-8">';

    while ($img = mysqli_fetch_assoc($b)) {
        if ($imgprinc) {
            $path = "../assets/img/";
            if ($obj = mysqli_fetch_assoc($a)) {

                // Card for the main object
                echo '<div class="card shadow mb-4">';
                echo '<div class="card-body text-center">';

                ?>
                <img src="<?php echo $path . $obj[nom_image]; ?>" class="img-fluid rounded mb-3" alt="">
                <p class="mb-1">Proprietaire: <?php echo $obj['nom']; ?></p>
                <p class="mb-1">Nom objet: <?php echo $obj['nom_objet']; ?></p>
                <p class="mb-1">Categorie: <?php echo $obj['nom_categorie']; ?></p>
                <?php

                echo '</div></div>'; // close card-body and card

                // Other images container start
                echo '<div class="card shadow mb-4">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">Autres images</h5>';
                echo '<div class="d-flex flex-wrap gap-2">';

                $imgprinc = false;
            }
        }

        ?>
        <img src="<?php echo $path . $img['nom_image']; ?>" class="img-thumbnail" style="max-width: 150px;" alt="">
        <?php
    }

    // If no main image was found but there’s an object and image
    if ($imgprinc) {
        $path = "../assets/img/";
        if ($obj = mysqli_fetch_assoc($a)) {
            if ($img = mysqli_fetch_assoc($b)) {

                // Fallback card if first block skipped
                echo '<div class="card shadow mb-4">';
                echo '<div class="card-body text-center">';

                ?>
                <img src="<?php echo $path . $img['nom_image']; ?>" class="img-fluid rounded mb-3" alt="">
                <?php

                echo '</div></div>';
            }
            ?>
            <div class="card shadow mb-4">
                <div class="card-body text-center">
                    <p class="mb-1">Proprietaire: <?php echo $obj['nom']; ?></p>
                    <p class="mb-1">Nom objet: <?php echo $obj['nom_objet']; ?></p>
                    <p class="mb-1">Categorie: <?php echo $obj['nom_categorie']; ?></p>
                </div>
            </div>
            <?php
        }
    }

    // Close other images container if it was opened
    if (!$imgprinc) {
        echo '</div></div></div>'; // close flex, card-body, card
    }

    echo '</div></div></div>'; // close col, row, container
}
?>