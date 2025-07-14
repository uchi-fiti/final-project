<?php 


require("../inc/connexion.php");
require("../inc/function.php");
$name=$_POST['nom'];
$andro=$_POST['daty'];
$email=$_POST['mail'];
$m=$_POST['mdpp'];
   
if(!Inscription(connectionbd(),$name, $andro, $email, $m)){
    echo "Something went wrong / email already in use";
}
else{
?>
<p>Compte enregistre !</p>
<a href = "../page/index.php">Retour a la page d acceuil</a>
<?php } ?>