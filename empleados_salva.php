<?php
        //empleados_salva.php
        require "Funciones/conecta.php";
        $con = conecta();

        //Recibe variables
        $nombres = $_REQUEST['nombres'];
        $apellidos = $_REQUEST['apellidos'];
        $correo = $_REQUEST['correo'];
        $pass = $_REQUEST['pass'];
        $rol = $_REQUEST['rol'];
        $archivo_nombre = $_FILES['foto']['name']; //este es el nombre real de la foto
        $archivo_temp = $_FILES['foto']['tmp_name']; //nombre temporal de la foto
        $ext = pathinfo($archivo_nombre, PATHINFO_EXTENSION); //Obtenemos la extension del archivo
        $dir = "Imagenes/Empleados/"; //Ubicacion de las fotos de los empleados
        $archivo_file = md5_file($archivo_temp); //Encriptamos el nombre de la foto
        
        if ($archivo_nombre) {
                $file_name1 = "$archivo_file.$ext";
                copy($archivo_temp, $dir.$file_name1);
        }

        $passEnc = md5($pass);

        $sql = "INSERT INTO empleados
                        (nombre, apellidos, correo, pass, rol, archivo_nombre, archivo_file)
                VALUES('$nombres', '$apellidos','$correo','$passEnc', $rol, '$archivo_nombre','$file_name1')";
        $res = $con->query($sql);

        header("Location: empleados_lista.php");
?>