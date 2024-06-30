<?php
	include "based.php";
	if(
        isset($_POST['id']) &&
		isset($_POST['Nombre']) && isset($_POST['Registro'])
		&& isset($_POST['Fecha']) && isset($_POST['HoraInicio'])
		&& isset($_POST['HoraFin']) && isset($_POST['Telefono'])
		&& isset($_POST['laboratorio']) && isset($_POST['cantidad'])
		&& isset($_POST['maestro']) && isset($_POST['material'])
	)
	{
		$BD = new BaseDeDatos();
		$res = $BD -> Modificar(
            $_POST['id'],
			$_POST['Nombre'],
			$_POST['Registro'],
			$_POST['Fecha'],
			$_POST['HoraInicio'],
			$_POST['HoraFin'],
			$_POST['Telefono'],	
			$_POST['Laboratorio'],
			$_POST['Cantidad'],
			$_POST['Maestro'],
			$_POST['Material']
		);
		echo json_encode(['id' => $res]);
	}
	else
		var_dump($_POST);
?>