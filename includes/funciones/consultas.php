<?php

function obtenerContactos(){
	include 'bd.php';
	try{
		//creo la sentencia
		$sql = 'SELECT nombre,empresa,telefono from contactos';
		return $conexion->query($sql);

	}catch(Exception $e){
		echo "Error ".$e->getMessage()."<br>";
		return false;

	}
}

?>