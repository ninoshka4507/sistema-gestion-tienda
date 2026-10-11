<?php
    require "Funciones/conecta.php";
    $con = conecta();

    //Recibe variables
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM promociones WHERE id = $id";
 
    $res = $con->query($sql);

    $row = $res->fetch_array();
    $foto = $row["archivo"];
    $nombre2 = $row["nombre"];



    echo "<div class='titulo'>Detalles de Promociones</div><br>";
    include 'Funciones/valida_sesion.php';
    include 'Funciones/menu.php';
    echo "<br><HR noshade align='center'><br>";
    echo "<div class='back'>
        <a href=\"promos_lista.php\">
        <img class='imagen' src='Imagenes\back.png' alt=''>
            Regresar al listado
        </a>
    </div>
    <br><br>";
    echo " <br><br><br>";
    echo "<div class='badge'>
            <div class='top_badge'>
                 <img src='Imagenes/Promociones/$foto'/>
            </div>
            <div class='bot_badge'>
                <h1>$nombre2</h1>
                <br><br><br><br><br><br>
                <img allign='center' class='f_badge' src='Imagenes\badge.png'>
            </div>
        </div>";
?>

    <title>Detalles de Promociones</title>
    <style>
    .titulo{
        color: #2A2F4F;
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

    .f_badge{
        width: 18%;
        height: 9%;
        display:block;
        margin: auto;
        opacity: 0.5;
    }
    a {
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
    .badge{
        width: 600px;
        height: fit-content;
        background-color: white;
        border-radius: 6px;
        position: sticky;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-10%);
        box-shadow: 0px 1px 10px 1px #2A2F4F;
        overflow: hidden;
        display: inline-block;  
    }
    .top_badge {
        height: 200px;
        background: #FDE2F3; 
        
    }
    
    .top_badge img{
        width: 600;
        height:200;
        pointer-events: none;
    }
    .bot_badge {
        height: 50px;
        padding: 20px;
        padding-top: 50px;
        background-color: #FFF;
        text-align: center;
        font-size: 25px;


    }


  </style>