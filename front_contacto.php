<!DOCTYPE html>
<?php
    echo "<div class='titulo'>ZsneakersZ</div><br>";
    echo "<hr class='linea'>";
    include 'Funciones/front_menu_inicio.php';
    echo "<br><HR noshade align='center'><br>";
    echo "<div class='back'>
        <a href=\"front_inicio.php\">
        <img class='imagen' src='Imagenes\back.png' alt=''>
            Regresar al inicio
        </a>
    </div>
    <br><br><br><br><br><br>";
?>
<html lang="en">
    <head>
        <style>
            #logo{
                width:150px;
                height:120px;
            }

            #p{
                position: absolute;
                right: 400px;
                text-align:center;
                bottom:30px;
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
                margin: auto 7%;
                width: 50vh;
                float: left;
                vertical-align: middle;
                display: inline-block;
            }

            .imagen{
                width: 8%;
                height: 3%;
            }

            label{
                display: inline-block;
                width: 80px;
                color: black;
            }

            input, textarea, select {
                font-family: system-ui;
                width: 250px;
                margin:2px auto;
                box-sizing: border-box;
                text-align: center;
                background-color: #CACFD6;
                border-color:#CACFD6;
            }

        </style>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form action="Funciones/front_envia_correo.php" method="POST" align="center">
        <label>Correo:</label>
            <input type="text" name="asunto" placeholder="Ingrese su correo de contacto"/><br><br>
        <label>Duda:</label>
        <textarea name="mensaje" placeholder="Ingrese su comentario o duda" rows="4" cols="50"></textarea><br><br>
        <input type="submit" value="Enviar correo">

        <br><br><br>

        </form>
        <?php  
            include "Funciones/front_footer.php";
        ?>
    </body>
</html>