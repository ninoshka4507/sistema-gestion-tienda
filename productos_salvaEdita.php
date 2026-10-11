<?php

    require "Funciones/conecta.php";
    $con = conecta();

    //Recibe variables
    $id = $_REQUEST['id'];
    $nombre = $_REQUEST['nombre'];
    $codigo = $_REQUEST['codigo'];
    $descripcion = $_REQUEST['descripcion'];
    $costo = $_REQUEST['costo'];
    $inventario = $_REQUEST['stock'];
    if($_FILES['imagen']['name'] != "" && $_FILES['imagen']['tmp_name'] != "") {
        $archivo_n = $_FILES['imagen']['name']; //nombre real del archivo
        $archivo_temp = $_FILES['imagen']['tmp_name']; //nombre temporal del archivo
        $ext = pathinfo($archivo_n, PATHINFO_EXTENSION); //Obtenemos la extension del archivo
        $dir = "imagenes/Productos/"; //Ubicacion de las fotos
        $archivo = md5_file($archivo_temp); //Nombre del archivo encriptado
    } 
    
    if ($archivo_n) { //Se cambia solo archivo
        $file_name1 = "$archivo.$ext";
        copy($archivo_temp, $dir.$file_name1);
    
        $sql = "UPDATE productos SET nombre = '$nombre', codigo = '$codigo', descripcion = '$descripcion', costo = '$costo',
        stock= '$inventario', archivo_n = '$archivo_n', archivo = '$file_name1'  WHERE id = '$id'";
        $res = $con->query($sql);
        
        header("Location: productos_lista.php");
    }else{                            // No se cambia ni archivo ni contraseña
        $sql = "UPDATE productos 
                SET nombre = '$nombre', codigo = '$codigo', descripcion = '$descripcion', costo = '$costo', stock= '$inventario'
                WHERE id = '$id'";
        $res = $con->query($sql);
        
        header("Location: productos_lista.php");
    }
?>