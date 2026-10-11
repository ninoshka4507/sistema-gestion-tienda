<?php
    require "funciones/conecta.php";
    $con = conecta();

    $sql = "SELECT * FROM pedidos WHERE estado = 1";

$res = $con->query($sql);

echo "<div class='titulo'>Listado de Pedidos</div><br>";
include 'Funciones/valida_sesion.php';
include 'Funciones/menu.php';
echo "<br><HR noshade align='center'><br>";
echo "<div class='back'>
</div>
<br><br>";


    echo "<div class='tabla'>
        <div class='fila1'>
            <div class='celdas'>ID</div>
            <div class='celdas'>Fecha</div>
            <div class='celdas'>Usuario</div>
            <div class='celdas'>Estado del pedido</div>
            <div class='celdas'>Ver Detalles del Pedido</div>
        </div>";
            while($row = $res->fetch_array()){
                $id = $row["id"];
                $fecha = $row["fecha"];
                $usuario = $row["usuario"];
                $status = $row["estado"];
                $status = ($status == 1) ? "Cerrado" : "Abierto";
                
                echo "<div class='filas2' id='tr$id'>
                    <div class='celdas'>$id</div>
                    <div class='celdas'>$fecha</div>
                    <div class='celdas'>$usuario</div>
                    <div class='celdas'>$status</div>
                    <div class='celdas'><a href=\"pedidos_detalle.php?id=$id\">Ver detalle</a></div>
                </div>";
            }
    echo "</div>
        <div id='mensaje'></div>";
?>
    <title>Listado de Pedidos</title>
    <script src="JS/jquery-3.3.1.min.js"></script>
        <script></script>

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

    .celdas {
        font-family: system-ui;
        display: table-cell;
        border: 1px solid black;
        text-align: center;
        vertical-align: middle;
        width: fit-content; 
    }
    .celda_accion{
        display: table-cell;
        border: 1px solid black;
        text-align: center;
        vertical-align: middle;
        width: 15%;
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
</style>