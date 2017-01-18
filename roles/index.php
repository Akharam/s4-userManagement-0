<?php
require_once "../connexion.php";
$db = creerConnexionBD();



echo "Nom des roles : <br>";

if(isset($_POST['triCrois'])){
    
$sql = "select * from role order by name";
    $reponse = $db->query($sql);
    foreach($reponse as $nom){
        echo "-> ".$nom['name']."<br>";
    }  
}
else if(isset($_POST['triDecrois'])){
     $sql = "select * from role order by name desc";
    $reponse = $db->query($sql);
    foreach($reponse as $nom){
        echo "-> ".$nom['name']."<br>";
    }  
}

else{
    $sql = "select * from role";
    $reponse = $db->query($sql);
    foreach($reponse as $nom){
        echo "-> ".$nom['name']."<br>";
    }
}

    


$sql = "select count(*) as nb from role";
$reponse = $db->query($sql);
$rep = $reponse->fetchColumn();

echo "<br><br>";
echo "Nombre de roles : ".$rep;

echo "<FORM method='post'>";
echo "<INPUT TYPE='submit' NAME='triCrois' VALUE='Tri croissant'>";
echo "<INPUT TYPE='submit' NAME='triDecrois' VALUE='Tri décroissant'>";
echo "</FORM>";
?>