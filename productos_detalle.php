<?php
    require "Funciones/conecta.php";
    $con = conecta();

    //Recibe variables
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM productos WHERE id = $id";
 
    $res = $con->query($sql);

    $row = $res->fetch_array();
    $imagen = $row["archivo"];
    $nombre2 = $row["nombre"];
    $codigo = $row["codigo"];
    $descripcion = $row["descripcion"];
    $costo = $row["costo"];
    $inventario = $row["stock"];


    echo "<div class='titulo'>Detalles de Productos</div><br>";
    include 'Funciones/valida_sesion.php';
    include 'Funciones/menu.php';
    echo "<br><HR noshade align='center'><br>";

    echo "<div class='back'>
        <a href=\"productos_lista.php\">
        <img class='imagen' src='Imagenes\back.png' alt=''>
            Regresar al listado
        </a>
    </div>
    <br><br>";
    echo " <br>";
    echo "<div class='badge'>
            <div class='top_badge'>
                <div class='foto'>
                    <img src='Imagenes/Productos/$imagen'/>
                </div>
            </div>
            <div class='bot_badge'>
                <h1>$nombre2</h1>
                <h2 style='margin-right: 10px;'>Codigo:</h2>
                <p>$codigo</p>
                <br>
                <h2 style='margin-right: 38px;'>Descripcion:</h2>
                <p>$descripcion</p>
                <br>
                <h2 style='margin-right: 38px;'>Costo:</h2>
                <p> $   $costo USD</p>
                <br>
                <h2 style='margin-right: 38px;'>Inventario:</h2>
                <p>     $inventario</p>
                <br>
                <br><br>
                <img allign='center' class='f_badge' src='Imagenes\jordan.png'>
            </div>
        </div>";
?>

    <title>Detalles de Productos</title>
    <meta charset="UTF-8">
    <style>
        body {
            background-color: #D6E5E3;
            display: grid; /* Enable CSS Grid */
            place-items: center; /* Center both horizontally and vertically */
            min-height: 100vh; /* Ensure body takes up full viewport height */
            margin: 0;
        }
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
            margin-left: 20px;
            margin-top: 20px;
            width: auto;
            display: inline-block;
        }

        .imagen{
            width: 40px;
            height: auto;
        }

        .f_badge{
            width: 9%;
            height: 9%;
            display:block;
            margin: auto;
            opacity: 0.5;
            position: absolute; /* Position the logo absolutely */
            bottom: 610px; /* Adjust the bottom value as needed */
            left: 0px;   /* Adjust the left value as needed */
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
        h2{
            font-family: system-ui;
            font-size: 14px;
            color: black;
            font-weight: bold;
            text-align: justify;
            display: inline;
            line-height: 1.5;
        }
        p{
            font-size: 16px;
            color: black;
            display: inline;
            font-weight: lighter;
            text-align: center;

        }
        .badge{
            width: 800px;
            height: 450px;
            background-color: white;
            border-radius: 15px;
            position: static;
            top: auto;
            left: auto;
            transform: none;
            box-shadow: 0px 1px 10px 1px #2A2F4F;
            overflow: hidden;
            display: inline-block;  
        }
        .top_badge {
            height: 200px;
            background: #9FD8CB; 
            position: relative;
            text-align: center;
        }
        
        .foto {
            background: white;
            width: 250px;
            height: 250px;
            padding: 5px;
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            margin: -165px 0 0 -120px;
        }
        .foto img{
            max-width: 100%;
            max-height:100%;
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            margin: -65px 0 0 -130px;
            pointer-events: none;
        }
        .bot_badge {
            display: flex; /* Use flexbox for better layout control */
            flex-direction: column;  /* Stack content vertically */
            padding: 20px;
            padding-top: 50px;
            max-height: 350px; /* Set a maximum height for the badge */
            overflow-y: auto; /* Add a scrollbar if content overflows */
        }
        .bot_badge > * { /* Target all direct children of .bot_badge */
            margin-bottom: 10px;  /* Add some spacing between elements */
            position: relative; /* Make the container a positioning context */
        }   
        .bot_badge h2, .bot_badge p {
            display: block;         /* Make them block-level elements */
            text-align: left;        /* Align text to the left */
            width: 100%;            /* Ensure they take full width */
        }
    </style>
