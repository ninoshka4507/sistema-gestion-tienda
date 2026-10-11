<?php 
    require "Funciones/conecta.php";
    $con = conecta();
    $id = $_REQUEST['id'];


        
    $sql = "DELETE From pedidos_productos 
    WHERE id_producto = $id";
    $res = $con->query($sql);

    echo $res=1;
?>