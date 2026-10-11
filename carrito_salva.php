<?php
    session_start();
    error_reporting(0);
    if (!isset($_SESSION['correo'])) {
      header('Location: index.php');
      exit;
    }
    $correo = $_SESSION['correo'];
    $contrasena = $_SESSION['contrasena'];
    
    $pos = strpos($correo, '@');
    if ($pos !== false) {
      $nomb = substr($correo, 0, $pos);
      $_SESSION['nomb']=$nomb;
    } else {
      $nomb = $correo;
    }



    $id=$_REQUEST['id'];
    $cant=$_REQUEST['cant'];
    require "funciones/conecta.php";
    $con= conecta();         
           
    $query = "SELECT * FROM pedidos";
    $resultado = $con->query($query);
    $bandera=false;
    while($row = $resultado->fetch_array()){
        if($row['estado']==0){
            $bandera=true;
            $ID_PED=$row['id'];
        }


    }



    if(!$bandera){
        echo $correo;
       $insertar = "INSERT INTO pedidos ( fecha, usuario, estado) VALUES (CURDATE(), '$correo', '0')";
        $res_insertar = $con->query($insertar);
       
        $revisaid="SELECT * from pedidos ";
        $resi = $con->query($revisaid);
        while($row = $resi->fetch_array()){
        if($row['estado']==0){
            $ID_PED=$row['id'];
        }}
        ?>
        <h1>Nuevo pedido con id: <?php echo $ID_PED?></h1>
        <?php

$bus= "SELECT* FROM pedidos_productos WHERE id_producto = $id and id_pedido=$ID_PED";
$rub= $con->query($bus);


while ($row = $rub->fetch_array()) {
    $ID_PRODUCTO=$row['id_producto'];
}
if($ID_PRODUCTO==$id){
    ?><h1>Si se encontro coincidencia</h1><?php
    $acomula="UPDATE  pedidos_productos  set cantidad= cantidad + $cant WHERE id_producto = $id";

   
    $res = $con->query($acomula);
    if($res){
        header("Location: carrito1.php?ID_PED=" . $ID_PED);
        exit();
    }

exit();

}else{
    ?><h1>No hay uno igual</h1><?php
   
}
//A partir de aqui no se ejecuta

$sqll = "SELECT* FROM productos WHERE id = $id";
$resa = $con->query($sqll);
while ($row = $resa->fetch_array()) {
$nom = $row['nombre'];
$precio = $row['costo'];
$subtotal = $precio * $cant;


$insertar = "INSERT INTO pedidos_productos (id_pedido, id_producto, cantidad, precio) VALUES ('$ID_PED','$id', '$cant', '$precio')";
$res_insertar = $con->query($insertar);
if ($res_insertar) {
   header("Location: carrito1.php?ID_PED=" . $ID_PED);
   
    
exit();
}else{
    echo "Error al insertar el producto: " . $con->error;
}}

    
        

    }else{
        
        ?>
        <table class="tabla">
            
            <tr>
                <td  class="col1">ID</td>
                <td  class="col2">Fecha</td>
                <td  class="col1">Usuario</td>
                <td  class="col2">Status</td>
                <td  class="col7">    </td>
            </tr>
   
            <h1>Pedido abierto: <?php echo $ID_PED?></h1>
   <?php 



        //Obtengo informacion de mi tabla pedido_productos
        $bus= "SELECT* FROM pedidos_productos WHERE id_producto = $id and id_pedido=$ID_PED";
        $rub= $con->query($bus);


        while ($row = $rub->fetch_array()) {
            $ID_PRODUCTO=$row['id_producto'];
        }
        if($ID_PRODUCTO==$id){
            ?><h1>Si se encontro coincidencia</h1><?php
            $acomula="UPDATE  pedidos_productos  set cantidad= cantidad + $cant WHERE id_producto = $id";

           
            $res = $con->query($acomula);
            if($res){
                header("Location: carrito1.php?ID_PED=" . $ID_PED);
                exit();
            }
    
        exit();
        
        }else{
            ?><h1>No hay uno igual</h1><?php
           
        }
        //A partir de aqui no se ejecuta
        
        $sqll = "SELECT* FROM productos WHERE id = $id";
        $resa = $con->query($sqll);
        while ($row = $resa->fetch_array()) {
        $nom = $row['nombre'];
        $precio = $row['costo'];
        $subtotal = $precio * $cant;

        
        $insertar = "INSERT INTO pedidos_productos (id_pedido, id_producto, cantidad, precio) VALUES ('$ID_PED','$id', '$cant', '$precio')";
        $res_insertar = $con->query($insertar);
        if ($res_insertar) {
           header("Location: carrito1.php?ID_PED=" . $ID_PED);
           
            
        exit();
        }else{
            echo "Error al insertar el producto: " . $con->error;
        }}
        
    }
        ?>
           