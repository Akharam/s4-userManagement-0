<?php
require_once "../connexion.php";
$db = creerConnexionBD();

$sql = "select * from user";
$reponse = $db->query($sql);

echo "Nom des utilisateurs : <br>";

foreach($reponse as $nom){
    echo "-> ".$nom['lastname']." ".$nom['firstname']."<br>";
}

?>