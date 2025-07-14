<?php

session_start(); 
echo "mandeha";
require("../inc/connexion.php");
require("../inc/function.php");

$email=$_POST['mail'];
$m=$_POST['mdpp'];
$bd = connectionbd();

$a = tabLogin($bd, $email, $m);

if($u = mysqli_fetch_assoc($a))  
{
    $_SESSION['idm']=$u['id_membre'];
    $_SESSION['names']=$u['nom'];
    echo "ok";
    header("Location:./home.php");
}
else{
    echo "ko";
    header("Location:./index.php");
    $_SESSION['v']=1;
}

?>