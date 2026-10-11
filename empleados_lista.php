<?php
//empleados_lista.php
require "Funciones/conecta.php";

$con= conecta();

$sql = "SELECT * FROM empleados
        WHERE status = 1 AND eliminado=0";
$res = $con->query($sql);

echo "<div class='titulo'>Listado de Administradores</div><br>";
include 'Funciones/valida_sesion.php';
include 'Funciones/menu.php';
echo "<HR noshade align='center'><br>";
echo "<div class='new'>
    <a href=\"empleados_alta.php\">
        <img class='imagen2' src='Imagenes\agregar_admin.png' alt=''>
        <br>
        Agregar administrador
    </a>
</div>
<br><br>";

echo "<br><br><br><div class='tabla'>
<div class='fila1'>
    <div class='celda'>ID</div>
    <div class='celda'>Nombre Completo</div>
    <div class='celda'>Correo</div>
    <div class='celda'>Rol</div>
    <div class='celda'>Ver detalle</div>
    <div class='celda'>Editar</div>
    <div class='celda'>Eliminar</div>
    </div>";
    while($row = $res->fetch_array()) {
        $id       = $row["id"];
        $nombre   = $row["nombre"];
        $apellido = $row["apellidos"];
        $correo   = $row["correo"];
        $rol      = $row["rol"];
        $rol      = ($rol==1)? "Gerente" : "Ejecutivo";
        echo "<div class='filas2' id='tr$id'>
                    <div class='celda'>$id</div>
                    <div class='celda'>$nombre $apellido</div>
                    <div class='celda'>$correo</div>
                    <div class='celda'>$rol</div>
                    <div class='celda_accion'>
                        <a href=\"empleados_detalle.php?id=$id\">
                            <img class='imagen' src='Imagenes\detalle.png' alt=''>
                            Ver detalle
                        </a>
                    </div>
                    <div class='celda_accion'>
                        <a href=\"empleados_edita.php?id=$id\">
                            <img class='imagen' src='Imagenes\cambiar.png' alt=''>   
                            Editar
                        </a>
                    </div>
                    <div class='celda_accion'>
                        <a href=\"javascript:eliminar($id)\">
                            <img class='imagen' src='Imagenes\borrar.png' alt=''>
                            Eliminar
                        </a>
                    </div>

                    
                </div>";
    }
?>



<html>
    <head>
        <title>Listado de Administradores</title>
        <meta charset="UTF-8">
        <script src="js/jquery-3.3.1.min.js"></script>
        <script>
            function eliminar(idE) {
                var id = idE;
                if(id) {
                    var mensaje = confirm("¿Esta seguro de querer eliminar este registro de la tabla?");
                    if (mensaje) {
                        $.ajax ({
                            url     : 'empleados_elimina.php?id='+id,
                            type    : 'post',
                            datatype : 'text',
                            data    : 'id='+id,
                            success : function(res) {
                                $("#tr" + id).hide();
                               setTimeout ("$('#mensaje').html('')",50000);
                                alert("Registro eliminado con exito");
                            },error: function() {
                                alert('Error archivo no encontrado...');
                            }
                        });
                    }
                    else {
                        alert("El registro no se ha eliminado");
                    }
                } else {
                    $('#mensaje').html('Ha ocurrido un error');
                }
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

            .new {
                font-family: system-ui;
                margin: auto 13%;
                float: left;
                vertical-align: middle;
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
            
            .celda_accion{
                display: table-cell;
                border: 1px solid black;
                text-align: center;
                vertical-align: middle;
                width: 15%;
            }

            .imagen{
                width: 8%;
                height: 8%;
            }
            
            .imagen2{
                width: 30%;
                height: 5%;
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

            body {
                background-color: #D6E5E3;
            }
                
        </style>
    </head>
    <body></body>
</html>