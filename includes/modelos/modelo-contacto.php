<?php

// Si la acciones es crear, entonces me crearas un registro
if ($_POST['accion']=='crear') {
	require_once('../funciones/bd.php');
	//valido las entradas, para evitar inyecciones sql
	$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
	$empresa = filter_var($_POST['empresa'], FILTER_SANITIZE_STRING);
	$telefono = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);

	try{
		//Llamo a mi conexion en la base de datos
		$stmt = $conexion->prepare("INSERT INTO contactos(nombre,empresa,telefono) VALUES(?,?,?)");
		//coloco los datos a insertar, los 3 son string
		$stmt->bindParam(1,$nombre);
		$stmt->bindParam(2,$empresa);
		$stmt->bindParam(3,$telefono);
		//ejecuto
		$stmt->execute();
		$affected = $stmt->rowCount();
		if($affected > 0){
				$respuesta = array(
				'respuesta' => 'correcto',
				'datos' => array(
					'nombre'=>$nombre,
					'empresa'=>$empresa,
					'telefono'=>$telefono
				)
			);
		}
		//cierro
		$stmt = null;
		//cierro la conexion a la base de datos
		$conexion = null;

	}catch(Exception $e){
		$respuesta = array(
			'error'=> $e->getMessage()
		);
	}

	echo json_encode($respuesta);
}
