<?php

include 'Funciones/front_menu_inicio.php';

session_start();
error_reporting(0);//Como a veces aparecen warnings los bloque con esa linea
// Verificamos la conexion si no nos manda a el logino
if (!isset($_SESSION['correo'])) {
  header('Location: index.php');
  exit;
}
//asiganmos a variables el valor de las variables de sesion
$correo = $_SESSION['correo'];
$contrasena = $_SESSION['contrasena'];

$pos = strpos($correo, '@');
if ($pos !== false) {
  $nomb = substr($correo, 0, $pos);
  $_SESSION['nomb']=$nomb;
} else {
  $nomb = $correo;
}
?>

<!DOCTYPE html>
<html>
	<head>
	<title>Bienvenido</title>
	<script src="JS/jquery-3.3.1.min.js"></script>
	<script>
		function actualizarCantidad(idProducto, cantidad) {
			$.ajax({
				url: 'pedidos_actualiza.php',
				type: 'POST',
				data: { idProducto: idProducto, cantidad: cantidad },
				success: function(response) {
					location.reload();
				},
				error: function() {
				// Manejar el error si la petición AJAX falla
				}
			});
		}
	</script>

	<script>
		function elim(id){
			yes = confirm("Se eliminara el producto con el ID: " +id+" Estas de acuerdo?");
			if(yes==true){
				$.ajax({
					url:    'carrito_elimina.php',
					type:  'post',
					dataType: 'text',
					data:   'id='+id,
					success: function(res){
						if(res==1){
							location.reload();
						}
						else{
							$('#mensaje').html('No se pudo eliminar correctamente');
							setTimeout("$('#mensaje').html(' ')",5000);
						}
						//setTimeout("$('#mensaje').html('')",5000);
					},error:function(){
						$('#mensaje').html('Archivo no enocntrado');
						setTimeout("$('#mensaje').html(' ')",5000);
					}
				});
			}
		}
		function reloadpage(nom,cant, precio, subtotal, DI){
			window.location.href = 'carrito2.php?nom='+nom+'&cant='+cant+'&precio='+precio+'&subtotal='+subtotal+'&DI='+DI;
		}
	</script>
    <style>
    .titulo{
        font-family: system-ui;
        color: #2D3319;
        text-align: center;
        font-weight: bold;
        font-size: 40px; 
        margin-top: 30;
    }    
    .tabla {
        display: table;
        width: 1200px;
        border: 1px solid black;
        border-collapse: separate;
        margin: auto;
        vertical-align: middle;
    }
    .fila1 {
        font-family: system-ui;
        display: table-row;
        text-align: center;
        line-height: 50px;
        font-weight: bold;
        height: 50px;
        background-color: #517664;
        border-left: 1px solid black;
        border-top: 1px solid black;
    }

    .filas2 {
        font-family: system-ui;
        display: table-row;
        border: 1px solid black;
        background-color: #9FD8CB;
        border-left: 1px solid black;
        border-top: 1px solid black;
    }

    .celda {
        font-family: system-ui;
        display: table-cell;
        border: 1px solid black;
        text-align: center;
        vertical-align: middle;
        width: fit-content; 
    }


    body {
        background-color: #D6E5E3;
    }

    ::selection {
        color: #2D3319;
        background: #D6E5E3;
    }

    a{
        color: #2D3319;
    }

    a:hover {
        color: #2D3319;
        font-weight: bold;
    }

    a:active {
        color: #517664;
    } 

    #mensaje {
        color: #F00;
        font-size: 18px;
        font-weight: bold;
        width: 400px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        margin:15px auto;
    }

    .footer{
        margin-top: 30px;
        text-align: center;
    }


    button{
        margin-left: 12% ;
        background-color: #D6E5E6;
        width: 70%;
        color: black;
        border: 1px solid black;
        height: 30px;
    
        cursor: pointer;
        transition: background-color 2s ease;
        transition: color 2s ease;
    }

    button:hover{
        background-color: #517664;
        color: white;
    }

    </style>
</head>
<body>
  
  
  <h1 class="titulo" >Carrito</h1 >
    <table class="tabla">
    
    <tr class="fila1">
        <td  class="celda">Producto</td>
        <td  class="celda">Cantidad</td>
        <td  class="celda">Costo</td>
        <td  class="celda">Subtotal</td>
        <td  class="celda">    </td>
    </tr>
    
    <?php
    require "Funciones/conecta.php";
    $con = conecta();
    @$ID_PED=$_REQUEST['ID_PED'];
    $sql= "SELECT*FROM pedidos_productos where id_pedido= $ID_PED";
    $res= $con->query($sql);
    
    
    while($row= $res->fetch_array()){
        $ID_PRO=$row['id_producto'] ;
        $cantR=$row['cantidad'];
        $sqql= "SELECT*FROM productos where id = $ID_PRO ";
        $resu= $con->query($sqql);
        while($rowa= $resu->fetch_array()){
            $nomR= $rowa['nombre'];
            $precio=$row['precio'];
            $subtotal=$cantR*$precio;
        }
                ?>
                <tr class="filas2">
                    <td class="celda"><?php echo $nomR?></td>
                    <td class="celda"><input id="number<?php echo $ID_PRO?>" type="number" value="<?php echo $cantR?>" onchange="actualizarCantidad(<?php echo $ID_PRO; ?>, this.value)"></td>
                    <td class="celda" > <?php echo $precio?></td>
                    <td class="celda"><p id="subtotal<?php echo$ID_PRO?>">$<?php echo $subtotal?></p></td>
                    <td><input type="submit" value="&#128465" onclick="elim('<?php echo $ID_PRO; ?>')">
</td>                  
                </tr>     
            <?php  @$total=$total+$subtotal;} ?>
 
            <tr class="filas2">
                    <td class="celda">Total:</td>
                    <td class="celda"></td>
                    <td class="celda" ></td>
                    <td class="celda" colspan="2">$<?php echo $total?></td>
                    
            </tr class="filas2">  

            <td class="celda" colspan="2"><button onclick="reloadpage('<?php echo $nomR; ?>', <?php echo $cantR; ?>, <?php echo $precio; ?>, <?php echo $subtotal; ?>, <?php echo $ID_PED; ?>);">Continuar </button></td>
     
         </table>




        <?php
            include "Funciones/front_footer.php"
        ?>
</body>
</html>

