<?php
  
    class BaseDeDatos
    {
        private $con;
        public function __construct()
        {
            $this->con = new PDO('mysql:host=localhost;dbname=bdIntegrador','root','');
        }
        

       public function consulta($id)
        {
            $sql = $this->con->prepare("SELECT * FROM cuenta where cuenta.id = " . $id );
            $sql->execute();
            $res = $sql->fetchAll();
            $arreglo = array();
            foreach ($res as $dato)
            {
                $obj = new Persona();
                $obj->nombre = $dato['nombre'];
                
         	array_push($arreglo, $obj);
            }
            return $arreglo;
        }


        public function ingreso($usr,$pass)
        {
            $sql = $this->con->prepare("SELECT * FROM cuenta WHERE BINARY cuenta.user = '" . $usr. "' and BINARY password = '" . $pass ."'" );
            $sql->execute();
            $res = $sql->fetchAll();

            if (count($res) > 0)
            {
                foreach ($res as $dato)

                    return $dato['id'];

                
            }
            return -1;
        }
	public function Insertar($id, $Nombre, $Registro, $Fecha, $HoraInicio, $HoraFin, $Telefono,  $Laboratorio, $Material, $Maestro, $Cantidad){
	   try {
		$SQL = $this -> con -> prepare("INSERT INTO eventos (nombre, registro, fecha, horaInicio, horaFinal, telefono, laboratorio, material, cantidad, maestro) VALUES ('$Nombre', '$Edad', '$Fecha', '$HoraInicio', '$HoraFin', '$Telefono', '$Precio', '$TipoInvitaciones', '$Invitados', '$Servicios');");
		if ($SQL -> execute()) {
			$id = $this -> con -> lastInsertId();
			echo json_encode(['id' => $id]);
		} else {
			echo json_encode(['error' => 'Error al insertar el registro']);
		}
	   } catch (PDOException $e) {
		echo json_encode(['error' => $e->getMessage()]);
	   }s
	}
    
    public function Eliminar($id) {
        $SQL = $this->con->prepare("DELETE FROM eventos WHERE id = :id");
        $SQL->bindParam(':id', $id);
        return $SQL->execute();
    }
        
     public function Modificar($id, $Nombre, $Registro, $Fecha, $HoraInicio, $HoraFin, $Telefono,  $Laboratorio, $Material, $Maestro, $Cantidad) {
            $SQL = $this->con->prepare(
                "UPDATE eventos
                SET nombre = :nombre, registro = :registro, fecha = :fecha,
                horaInicio = :horaInicio, horaFinal = :horaFinal, telefono = :telefono, laboratorio = :laboratorio,
                material = :material,
                cantidad = :cantidad,
                maestro = :maestro
                WHERE id = :id;"
            );
            $SQL->bindParam(':nombre', $Nombre);
            $SQL->bindParam(':registro', $Registro);
            $SQL->bindParam(':fecha', $Fecha);
            $SQL->bindParam(':horaInicio', $HoraInicio);
            $SQL->bindParam(':horaFinal', $HoraFin);
            $SQL->bindParam(':telefono', $Telefono);
            $SQL->bindParam(':laboratorio', $Laboratorio);
            $SQL->bindParam(':material', $Material);
            $SQL->bindParam(':cantidad', $Cantidad);
            $SQL->bindParam(':maestro', $Maestro);
            $SQL->bindParam(':id', $id);
            return $SQL->execute();
        }
    
}
        
    