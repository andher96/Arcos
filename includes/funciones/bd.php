<?php

//Realizo la conexion
try{
	$conexion = new PDO('mysql:host=localhost;dbname=agendaphp','root','');
}catch(PDOException $e){
	echo "Error ".$e->getMessage();
}

?>