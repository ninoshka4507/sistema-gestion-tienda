<?php
    require "Funciones/conecta.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idProducto = $_POST['idProducto'];
        $cantidad = $_POST['cantidad'];

        $con = conecta();
        $sql = "UPDATE pedidos_productos SET cantidad = $cantidad WHERE id_producto = $idProducto";
        $result = $con->query($sql);

        if ($result) {
            echo "Cantidad actualizada correctamente";
        } else {
            echo "Error al actualizar la cantidad: " . $con->error;
        }

        $con->close();
    }
?>
