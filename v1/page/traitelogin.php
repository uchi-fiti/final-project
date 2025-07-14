<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start(); 
echo "mandeha";
require("../inc/connection.php");
require("../inc/function.php");

$email=$_POST['mail'];
$m=$_POST['mdpp'];
$bd = connectionbd();

$a = tabLogin($bd, $email, $m);

if($u = mysqli_fetch_assoc($a))  
{
    $_SESSION['idm']=$u['idMembre'];
    $_SESSION['names']=$u['Nom'];
    echo "ok";
    header("Location:../page/home.php");
}
else{
    echo "ko";
    header("Location:../page/index.php");
    $_SESSION['v']=1;
}

?>