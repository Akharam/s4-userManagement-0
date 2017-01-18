<?php
function creerConnexionBD(){
	try{	
		$bd = new PDO('mysql:host=localhost;dbname=phalcon-td0;charset=utf8', 'root', '');
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
	return $bd;	
}
?>