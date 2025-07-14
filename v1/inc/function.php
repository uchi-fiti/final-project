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
    $request = 'SELECT * from Membres where Email = "%s";';
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
 function Inscription($bd, $name, $andro, $email, $m)
 {
    $requete = 'INSERT INTO fp_membre (nom, date_naissance, email, mdp)VALUES ("%s" , "%s", "%s", "%s");';
    $requete = sprintf($requete, $name, $andro, $email, $m);
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
?>