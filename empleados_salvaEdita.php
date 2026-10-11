<?php
    //empleados_salva.php
    require "Funciones/conecta.php";
    $con = conecta();

    //Recibe variables
    $id = $_REQUEST['id'];
    $nombre = $_REQUEST['nombres'];
    $apellidos = $_REQUEST['apellidos'];
    $correo = $_REQUEST['correo'];
    $pass = $_REQUEST['pass'];

    if($_FILES['foto']['name'] != "" && $_FILES['foto']['tmp_name'] != "") {
        $archivo_nombre = $_FILES['foto']['name']; //este es el nombre real de la foto
        $archivo_temp = $_FILES['foto']['tmp_name']; //nombre temporal de la foto
        $ext = pathinfo($archivo_nombre, PATHINFO_EXTENSION); //Obtenemos la extension del archivo
        $dir = "Imagenes/Empleados/"; //Ubicacion de las fotos de los empleados
        $archivo_file = md5_file($archivo_temp); //Encriptamos el nombre de la foto
    }
    if($pass && $archivo_nombre) { //Se cambia tanto contraseña como archivo
        $rol = $_REQUEST['rol'];
        $file_name1 = "$archivo_file.$ext";
        copy($archivo_temp, $dir.$file_name1);
        $passEnc = md5($pass);
    
        $sql = "UPDATE empleados 
                SET nombre = '$nombre', apellidos = '$apellidos', correo = '$correo', pass = '$passEnc',
                    rol = '$rol', archivo_nombre = '$archivo_nombre', archivo_file = '$file_name1' 
                WHERE id = '$id'";
        $res = $con->query($sql);
        
        header("Location: empleados_lista.php");
    }else if($pass && !$archivo_nombre){ //Se cambia solo contraseña
        $rol = $_REQUEST['rol'];
        $passEnc = md5($pass);
    
        $sql = "UPDATE empleados 
                SET nombre = '$nombre', apellidos = '$apellidos', correo = '$correo', pass = '$passEnc',rol = '$rol' 
                WHERE id = '$id'";
        $res = $con->query($sql);
        
        header("Location: empleados_lista.php");
    }else if(!$pass && $archivo_nombre) { //Se cambia solo archivo
        $rol = $_REQUEST['rol'];
        $file_name1 = "$archivo_file.$ext";
        copy($archivo_temp, $dir.$file_name1);
    
        $sql = "UPDATE empleados 
                SET nombre = '$nombre', apellidos = '$apellidos', correo = '$correo',rol = '$rol', 
                    archivo_nombre = '$archivo_nombre', archivo_file = '$file_name1' 
                WHERE id = '$id'";
        $res = $con->query($sql);
        
        header("Location: empleados_lista.php");
    }else{                            // No se cambia ni archivo ni contraseña
        $rol = $_REQUEST['rol'];

        $sql = "UPDATE empleados 
                SET nombre = '$nombre', apellidos = '$apellidos', correo = '$correo', rol = '$rol' 
                WHERE id = '$id'";
        $res = $con->query($sql);
        
        header("Location: empleados_lista.php");
    }
?>