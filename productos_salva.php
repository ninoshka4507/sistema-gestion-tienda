<?php
        //empleados_salva.php
        require "Funciones/conecta.php";
        $con = conecta();

        //Recibe variables
        $nombre = $_REQUEST['nombre'];
        $codigo = $_REQUEST['codigo'];
        $descripcion = $_REQUEST['descripcion'];
        $costo = $_REQUEST['costo'];
        $inventario = $_REQUEST['stock'];
        $archivo_n = $_FILES['foto']['name']; //nombre real del archivo
        $archivo_temp = $_FILES['foto']['tmp_name']; //nombre temporal del archivo
        $ext = pathinfo($archivo_n, PATHINFO_EXTENSION); //Obtenemos la extension del archivo
        $dir = "Imagenes/Productos/"; //Ubicacion de las fotos
        $archivo = md5_file($archivo_temp); //Nombre del archivo encriptado

        if ($archivo_n) {
                $file_name1 = "$archivo.$ext";
                copy($archivo_temp, $dir.$file_name1);
        }

        $sql = "INSERT INTO productos
                        (nombre, codigo, descripcion, costo, stock, archivo_n, archivo)
                VALUES('$nombre', '$codigo','$descripcion','$costo', $inventario,'$archivo_n','$file_name1')";
        $res = $con->query($sql);

        header("Location: productos_lista.php");
?>