<?php
    require "Funciones/conecta.php";
    $con = conecta();

    //Recibe variables
?>
<?php
   echo "<div class='titulo'>Detalles de Pedidos</div><br>";
   include 'Funciones/valida_sesion.php';
   include 'Funciones/menu.php';
   echo "<br><HR noshade align='center'><br>";
   echo "<div class='back'>
       <a href=\"front_pedidos.php\">
       <img class='imagen' src='Imagenes\back.png' alt=''>
           Regresar al listado
       </a>
   </div> ";
   echo " <br>";

?>
    <table class=tabla border="1" align="center">
    <tr class=fila1>
        <td class=""celda">ID del producto</td>
        <td class=celda>Nombre</td>
        <td class=celda>Cantidad</td>
        <td class=celda>Costo</td>
        <td class=celda>Subtotal</td>
    </tr>
<?php
    $id_pedido = $_REQUEST['id']; 
    $sql = "SELECT * FROM pedidos_productos WHERE id_pedido = $id_pedido";
    $res = $con->query($sql);
    while($mostrar = $res->fetch_array() ){
        $id_producto = $mostrar["id_producto"];
        $cantidad = $mostrar["cantidad"];
        $sqql = "SELECT * FROM productos WHERE id = $id_producto";
        $resu = $con->query($sqql);
        while($row = $resu->fetch_array()){
            $nombre = $row['nombre'];
            $precio = $row['costo'];
        
        

    }
?>

    <tr class=filas2>
        <td class="celda">
            <?php echo "$id_producto";?>
        </td>
        <td class="celda">
            <?php echo "$nombre";?>
        </td>
        <td class="celda">
            <?php echo "$cantidad";?>
        </td>
        <td class="celda">
            <?php echo "$precio";?>
        </td class="celda">
        <td class="celda" colspan="2">
            <?php echo $subtotal=$cantidad*$precio;?>
        </td>
    </tr>
    <?php @$total= $total+$subtotal;}?>
    <tr class=filas2>
        <td class="celda" >Total</td>
        <td  class="celda colspan="4">$<?php echo $total ?></td>
    </tr>
</table>


    <title>Ver Detalles del Pedido</title>
    <style>

        .imagen{
            width: 8%;
            height: 3%;
        }

        .back{
            margin: auto 7%;
            width: 50vh;
            float: left;
            vertical-align: middle;
            display: inline-block;
        }

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

        body{
            background-color: #D6E5E3;
        }
        
        .footer-container {
            grid-row: 3 / 4;             /* Place the footer in the third row */
            display: flex;               /* Enable Flexbox for centering within the footer */
            justify-content: center;    /* Center horizontally */
            align-items: center;        /* Center vertically */
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
            margin-top: 1000px;
            text-align: center;
        }


        button{
            margin-left: 12% ;
            background-color: white;
            width: 70%;
            color: black;
            border: 2px solid black;
            height: 30px;
            cursor: pointer;
            transition: background-color 2s ease;
            transition: color 2s ease;
        }

        button:hover{
            background-color: #517664;
            color: white;
        }
        

        .card-container {
            width: 300px;
            height: 400px;
            background: #FFF;
            border-radius: 6px;
            position: sticky;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-10%);
            box-shadow: 0px 1px 10px 1px #000;
            overflow: hidden;
            display: inline-block;
        }
        .upper-container {
            height: 150px;
            background: lightskyblue;
        }
        .image-container {
            background: lightblue;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            padding: 5px;
            transform: translate(100px,100px);
        }
        .image-container img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
        }
        .lower-container {
            height: 280px;
            background: lightcyan;
            padding: 20px;
            padding-top: 50px;
        }
        .lower-container h3, h4 {
            box-sizing: border-box;
            line-height: .6;
            font-weight: 700;
            text-align: center;
        }
        .lower-container h4 {
            color: black;
            font-weight: bold;
            text-align: left;
            display: inline;
            line-height: 1.5;
        }

        .lower-container p {
            font-size: 16px;
            color: black;
            display: inline;
            font-weight: lighter;
        }
    </style>