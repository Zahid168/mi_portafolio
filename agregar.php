<?php
	include "based.php";
	if(
		isset($_POST['Nombre']) && isset($_POST['Edad'])
		&& isset($_POST['Fecha']) && isset($_POST['HoraInicio'])
		&& isset($_POST['HoraFin']) && isset($_POST['Telefono'])
		&& isset($_POST['Precio']) && isset($_POST['Invitados'])
		&& isset($_POST['Servicios']) && isset($_POST['TipoInvitaciones'])
	)
	{
		
		$BD = new BaseDeDatos();
		$res = $BD -> Insertar(
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