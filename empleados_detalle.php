<?php
    require "Funciones/conecta.php";
    $con = conecta();

    //Recibe variables
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM empleados WHERE id = $id";
 
    $res = $con->query($sql);

    $row = $res->fetch_array();
    $foto = $row["archivo_file"];
    $nombre2 = $row["nombre"];
    $apellidos = $row["apellidos"];
    $correo = $row["correo"];
    $rol = $row["rol"];
    $rol = ($rol == 1) ? "Gerente" : "Ejecutivo";
    $status = $row["status"];
    $status = ($status == 1) ? "Activo" : "Inactivo";

    echo "<div class='titulo'>Detalles de Administrador</div><br>";
    include 'Funciones/valida_sesion.php';
    include 'Funciones/menu.php';
    echo "<br><HR noshade align='center'><br>";
    echo "<div class='back'>
        <a href=\"empleados_lista.php\">
            <img class='imagen' src='Imagenes\back.png' alt=''>
            Regresar al listado
        </a>
    </div>
    <br><br>";
    echo " <br><br><br>";
    echo "<div class='badge'>
            <div class='top_badge'>
                <div class='foto'>
                    <img src='Imagenes/Empleados/$foto'/>
                <br><br><br>Foto
            </div>
            </div>
            <div class='bot_badge'>
                <h1>$nombre2 $apellidos</h1>
                <h2 style='margin-right: 10px;'>Correo:</h2>
                <p>$correo</p>
                <br>
                <h2 style='margin-right: 38px;'>Rol:</h2>
                <p>$rol</p>
                <br>
                <h2 style='margin-right: 15px;'>Status:</h2>
                <p>$status</p>
                <br><br><br><br><br>
                <img allign='center' class='f_badge' src='Imagenes\jordan.png'>
            </div>
        </div>";
?>
<html>
    <head>
        <title>Detalles de Administrador</title>
        <meta charset="UTF-8">
        <style>
            .titulo{
                font-family: system-ui;
                color: #2D3319;
                text-align: center;
                font-weight: bold;
                font-size: 40px; 
                margin-top: 30;
            }    
            .back{
                font-family: system-ui;
                margin: auto 7%;
                width: 50vh;
                float: left;
                vertical-align: middle;
                display: inline-block;
            }
            body {
                background-color: #D6E5E3;
            }

            .imagen{
                width: 8%;
                height: 3%;
            }
            .back{
                font-family: system-ui;
                margin: auto 7%;
                width: 50vh;
                float: left;
                vertical-align: middle;
                display: inline-block;
            }
            .f_badge{
                width: 18%;
                height: 15%;
                display:block;
                margin: auto;
                opacity: 0.5;
            }
            a{
                color: #2D3319;
            }

            a:hover {
                color: #517664;
                font-weight: bold;
            }

            a:active {
                color: #517664;
            } 
            
            ::selection {
                color: #2D3319;
                background: #D6E5E3;
            }

            h1{
                font-family: system-ui;
                font-size: 20px;
                text-align: center;
            }
            h2{
                font-family: system-ui;
                font-size: 14px;
                color: black;
                font-weight: bold;
                text-align: left;
                display: inline;
                line-height: 1.5;
            }
            p{
                font-size: 16px;
                color: black;
                display: inline;
                font-weight: lighter;
            }
            .badge{
                width: fit-content;
                height: 450px;
                background-color: white;
                border-radius: 15px;
                position: sticky;
                top: 50%;
                left: 50%;
                transform: translate(-50%,-10%);
                box-shadow: 0px 1px 10px 1px #2A2F4F;
                overflow: hidden;
                display: inline-block;  
            }
            .top_badge {
                height: 150px;
                background: #9FD8CB; 
                position: relative;
            }
            
            .foto {
                background: white;
                width: 80px;
                height: 120px;
                border-radius: 50%;
                padding: 5px;
                text-align: center;
                position: absolute;
                top: 50%;
                left: 50%;
                margin: -60px 0 0 -40px;

            }
            .foto img{
                max-width: none;
                max-height:100%;
                display: block;
                border-radius: 40%;
                position: absolute;
                top: 50%;
                left: 50%;
                margin: -65px 0 0 -70px;
                pointer-events: none;
            }
            .bot_badge {
                height: fit-content;
                padding: 20px;
                padding-top: 50px;
                background-color: #FFF;

            }
        </style>
    </head>
    <body></body>
</html>
    