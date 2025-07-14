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
    $request = "select * from fp_emprunt where id_objet = %d AND id_membre = %d";
    $request = sprintf($request , $id_objet, $idm);
    $query = mysqli_query($bd, $request);
    if($data = mysqli_fetch_assoc($query))
    {
        if($data['date_retour'] > NOW())
    {
        return $data['date_retour'];
    }
    }
    return null;
}
 function listeObjets($bd, $idm)
 {
    $req = 'select * from fp_objet where id_membre = %d;';
    $req = sprintf($req, $idm);
    $a = mysqli_query($bd, $req);
    ?>
    <table class="table table-hover">
        <tr>
            <th>Nom objet</th>
            <th>Emprunte</th>
            <th>Date Retour</th>
        </tr>
        <?php
    while($obj = mysqli_fetch_assoc($a))
    {
        ?>
        <tr>
            <td><?php echo $obj['nom_objet'];?></td>
            <td><?php echo dateretour($bd, $obj['id_objet'], $idm) == null ? "" : "emprunte";?></td>
            <td><?php echo dateretour($bd, $obj['id_objet'], $idm) == null ? "" : dateretour($bd, $obj['id_objet'], $idm);?></td>
        </tr>
        <?php
    }
    ?>
    </table>
    <?php
 }
 function choixCategorie($bd)
 {
    ?>
    <select name="categorie">
    <?php
    $request = "select * from fp_categorie_objet;";
    $query = mysqli_query($bd, $request);
    while($data = mysqli_fetch_assoc($query))
    {
        ?>
        <option value="<?php echo $data['id_categorie'];?>"><?php echo $data['nom_categorie'];?></option>
        <?php
    } ?>
    </select>
    <?php 
 }
 function listeObjetsparCategorie($bd, $idm, $idc)
 {
    $req = 'select * from fp_objet where id_membre = %d and id_categorie = %d;';
    $req = sprintf($req, $idm, $idc);
    $a = mysqli_query($bd, $req);
    ?>
    <table class="table table-hover">
        <tr>
            <th>Nom objet</th>
            <th>Emprunte</th>
            <th>Date Retour</th>
        </tr>
        <?php
    while($obj = mysqli_fetch_assoc($a))
    {
        ?>
        <tr>
            <td><?php echo $obj['nom_objet'];?></td>
            <td><?php echo dateretour($bd, $obj['id_objet'], $idm) == null ? "" : "emprunte";?></td>
            <td><?php echo dateretour($bd, $obj['id_objet'], $idm) == null ? "" : dateretour($bd, $obj['id_objet'], $idm);?></td>
        </tr>
        <?php
    }
    ?>
    </table>
    <?php
 }
?>