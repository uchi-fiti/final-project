<?php 
session_start();
require("../inc/connexion.php");
require("../inc/function.php");
$name=$_POST['nom'];
$andro=$_POST['daty'];
$email=$_POST['mail'];
$genre = $_POST['genre'];
$ville = $_POST['ville'];
$m=$_POST['mdpp'];
   
if(!Inscription(connectionbd(),$name, $andro, $genre, $email, $ville, $m)){
    echo "Something went wrong / email already in use";
}
else{
?>
<p>Compte enregistre !</p>
<?php 
    header("Location: index.php");
?>
<!-- <a href = "../page/index.php">Retour a la page d acceuil</a> -->
<?php } ?>