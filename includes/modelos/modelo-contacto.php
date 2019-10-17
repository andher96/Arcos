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
		$stmt->bind_param("sss",$nombre,$empresa,$telefono);
		//ejecuto
		$stmt->execute();
		if($stmt->affected_rows == 1){
				$respuesta = array(
				'respuesta' => 'correcto',
				'datos' => array(
					'nombre'=>$nombre,
					'empresa'=>$empresa,
					'telefono'=>$telefono,
					'id_insertado'=>$stmt->insert_id
				)
			);
		}
		//cierro
		$stmt->close();
		//cierro la conexion a la base de datos
		$conexion->close();

	}catch(Exception $e){
		$respuesta = array(
			'error'=> $e->getMessage()
		);
	}

	echo json_encode($respuesta);
}
