<!DOCTYPE html>

<?php
    include 'Funciones/valida_sesion.php';
    echo "<br><br>";
    $nombre = $_SESSION['nombre'];
    echo "<title>Bienvenido</title>";
    echo "<br><br>";
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <style>
        body {
            font-family: system-ui;
            margin: 0;
            padding: 0;
            height: 100vh;
            background-color: #D6E5E3;

        }
        .menu {
            margin: 0 auto;
            width: 80%;
        }

        .mensaje {
            text-align: center;
            animation: fade-in 3s ease-out forwards;
            opacity: 0;
        }

        @keyframes fade-in {
            0% {
                opacity: 0;
                transform: translateY(-50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            font-family: system-ui;
            font-size: 3em;
            color: #333;
            margin-bottom: 20px;
        }

        ::selection {
            color: #2D3319;
            background: #D6E5E3;
        }
        
        p {
            font-size: 1.5em;
            color: #666;
        }

        .linea {
            background-color: #517664;
            border: 0;
            height: 5px;
            width: 100%;
            margin-bottom: 20px;
            animation: animar_linea 3s ease-in-out infinite;
        }

        @keyframes animar_linea {
            0% {
                transform: scaleX(0);
            }
            50% {
                transform: scaleX(1);
            }
            100% {
                transform: scaleX(0);
            }
        }
    </style>
</head>
<body>
    <div class="mensaje">
        <h1>¡Hola!</h1>
        <hr class="linea">
        <div class="menu">
            <?php
                include 'Funciones/menu.php';
            ?>
        </div>
        <p>Bienvenido al Sistema de Administración</p>
        <?php
            echo "<p style='font-size: 1.5em; font-family: system-ui; '> $nombre </p>"; 
        ?>
    </div>
    
</body>
</html>
