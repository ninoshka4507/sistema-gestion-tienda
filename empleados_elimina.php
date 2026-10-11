<?php
        //empleados_elimina.php";
        require "funciones/conecta.php";
        $con = conecta();
                
        //recibe variables
        $id = $_REQUEST['id'];

        //$sql = "DELETE FROM empleados WHERE id = $id";  #MANERA DE ELIMINAR REGISTRO DE LA TABLA DE LA BD
        $sql = "UPDATE empleados 
                SET eliminado = 1 
                WHERE id = $id";
        $res = $con->query($sql);

        header("Location: empleados_lista.php");
?>