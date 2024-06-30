<?php
    include "based.php";
    if (isset($_POST['id'])) {
        $BD = new BaseDeDatos();
        $res = $BD->Eliminar($_POST['id']);
        if ($res) {
            echo "Pedido eliminado exitosamente";
        } else {
            echo "Error al eliminar el pedido";
        }
    } else {
        echo "No se ha proporcionado un número de teléfono";
    }
?>