<?php
require_once "../connexion.php";
$db = creerConnexionBD();
?>

<FORM method='post'>
    <fieldset>
        <legend> Role :</legend>
        <label>Nom : </label><input type='text' name='fiNom' />
    <INPUT TYPE='submit' NAME='filtre' VALUE='Filtrer'><br>

        <table border=1>
            <tr><td>Nom des roles</td><td>Nombre d'utilisateurs</td></tr>    

    <?php
            
if(isset($_POST['filtre']) && !empty($_POST['filtre'])){
    echo $_POST['filtre'];
    $filtre = "where name ='".$_POST['filtre']."'";
    var_dump($filtre);
}
else
    $filtre ="";

if(isset($_POST['triCrois'])){
$sql = "select count(*) as nb, name from user us 
join role ro on ro.id=us.idrole ".$filtre."
group by name order by name";
    $reponse = $db->query($sql);
    foreach($reponse as $nom){
        echo "<tr><td> ".$nom['name']."</td><td> ".$nom['nb']."</td></tr><br>";
    }  
}
else if(isset($_POST['triDecrois'])){
    $sql = "select count(*) as nb, name from user us 
join role ro on ro.id=us.idrole ".$filtre."
group by name order by name desc";
    $reponse = $db->query($sql);
    foreach($reponse as $nom){
        echo "<tr><td> ".$nom['name']."</td><td> ".$nom['nb']."</td></tr><br>";
    }
    
}
else
    if(isset($_POST['supNB'])){
$sql = "select count(*) as nb, name from user us 
join role ro on ro.id=us.idrole ".$filtre."
group by name order by nb";
    $reponse = $db->query($sql);
    foreach($reponse as $nom){
        echo "<tr><td> ".$nom['name']."</td><td> ".$nom['nb']."</td></tr><br>";
    }  
}
else if(isset($_POST['infNB'])){
    $sql = "select count(*) as nb, name from user us 
join role ro on ro.id=us.idrole ".$filtre."
group by name order by nb desc";
    $reponse = $db->query($sql);
    foreach($reponse as $nom){
        echo "<tr><td> ".$nom['name']."</td><td> ".$nom['nb']."</td></tr><br>";
    }
    
}
else{
    $sql = "select count(*) as nb, name from user us 
join role ro on ro.id=us.idrole ".$filtre."
group by name";
    $reponse = $db->query($sql);
    foreach($reponse as $nom){
        echo "<tr><td> ".$nom['name']."</td><td> ".$nom['nb']."</td></tr><br>";
    }
}
echo "</tr>";


?>
        </table>
<INPUT TYPE='submit' NAME='triCrois' VALUE='Tri croissant'>
<INPUT TYPE='submit' NAME='triDecrois' VALUE='Tri decroissant'>
<INPUT TYPE='submit' NAME='supNB' VALUE='Nombre Croissant'>
<INPUT TYPE='submit' NAME='infNB' VALUE='Nom decroissant'>


</fieldset></FORM>
