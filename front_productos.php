<?php
require "Funciones/conecta.php";
$con = conecta();

$sql = "SELECT * FROM productos WHERE eliminado != 1 ORDER BY codigo"; // Fetch all non-deleted products
$res = $con->query($sql);

//Start of HTML
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
<br><br><br><br>";


echo "<div class='productsprevia'>"; // Container for all product previews
while ($row = $res->fetch_array()) {
    $id = $row['id'];
    $foto = $row['archivo'];
    $nom = $row['nombre'];
    $cost = $row['costo'];

    echo "<div class='contentprod'>";
    echo "<img class='imgpv' src='imagenes/Productos/$foto' alt='$nom' width='300px'>"; // Use alt for accessibility
    echo "<div class='textocontprod'>";
    echo "<p>$nom</p>";
    echo "<p>$$cost</p>";
    echo "</div>";
    echo "<div class='textocontprodlinks'>";
    echo "<button onclick=\"redirectToPage($id)\">Comprar</button>";
    echo "<br><br>";
    echo "</div>";
    echo "</div>"; // Close contentprod
}
echo "</div>"; // Close productsprevia


include "Funciones/front_footer.php";
?>


    <title>Productos</title>
    <script src="JS/jquery-3.3.1.min.js"></script>
    <script>
            function redirectToPage(id){
                window.location.href = 'front_detalle.php?id=' + id;
            }
        </script>

    

<style>

    body {
        background-color: #D6E5E3;s
    }

    ::selection{
        color: #2D3319;
        background: #D6E5E3;
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

    .tabla {
        display: table;
        width: 1200px;
        border: 2px solid black;
        margin: auto;
    }

    .encabezado {
        display: table-row;
        text-align: center;
        line-height: 50px;
        font-weight: bold;
        height: 50px;
        background-color: lightskyblue;
    }

    .filas2 {
        display: table-row;
        border: 2px solid black;
        background-color: lightcyan;
    }

    .celdas {
        display: table-cell;
        border: 2px solid black;
        text-align: center;
        vertical-align: middle;
        width: 15%;
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

    .barraFront{
        background-color:#600202;
        height: 50px;
        width: 100%;
    }

    .barraFront a{
        color: white;
    }

    .barraFront li{
        color: white;
        float: left;
        margin-top: 15px;
        margin-left: 25px;
    }

    .imagenLogo{
        margin-top: 5px;
        width: 40px;
        height: 40px;
        float: right;
        margin-right: 10px;
    }

    .footer{
        margin-top: 1000px;
        text-align: center;
    }

    .formacorreo {
        width: 800px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 100px;
        align-items: center;
    }

    form{
        align-self: center;
        width: 80%;
        margin-left: 40px;
    }
    .formacorreo input{
        margin-top: 10px;
        text-align: center;
        width: 90%;
        padding: 10px;
        margin-bottom: 20px;
        border: none;
        border-radius: 5px;
        box-shadow: 0 0 5px #ccc;
    }
    .Cuerpo{
        height: 100px;
        text-align: center;
        width: 90%;
        padding: 10px;
        margin-bottom: 20px;
        border: none;
        border-radius: 5px;
        box-shadow: 0 0 5px #ccc;
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
    }
    button:hover{
        background-color: #517664;

    }

    .TituloCentro{
        text-align: center;
        margin-left: -105x;
    }

    .banneraleatorio{
        margin: 0 auto;
        width: 1600px;
        background-color: #ffffff;
    }

    .imagenssmues{
        width: 1000px;
        margin: 0 auto;
        margin-top: 50px;
    }

    .productsprevia{
        display: flex;               /* Enable Flexbox */
        flex-wrap: wrap;           /* Allow items to wrap to the next line */
        justify-content: center;    /* Center items horizontally */
        gap: 20px;                 /* Add space between items (adjust as needed) */
        margin: 50px auto;
    }

    .contentprod{
        font-family: system-ui;
        position: relative;
        width: 250px;
        height: 300px;
        float: left;
        margin-top: 20px;
        margin-left: 48px;
        margin-right: 50px;
        background-color: #fff; 
        border: 2px solid #517664;

    }

    .imgpv{
        margin-left: 40px;
        width: 170px; 
        height: auto;
        align-items: auto;
        margin-top: 20px;
    }

    .textocontprod p{
        font-family: system-ui;
        margin-left: 10px;
        margin-bottom: 10px;
        font-size: medium;
        
    }

    .textocontprodlinks a{
        margin-right: 10px;
        margin-bottom: 10px;
        font-size: medium;
        
    }


    .textocontprod{
        position: absolute;
        bottom: 0; /* Coloca el div en la parte inferior */
        width: 60%;
        padding: 10px;
    }

    .textocontprodlinks{
        position: absolute;
        bottom: 0; /* Coloca el div en la parte inferior */
        right:  0;
        width: 40%;
        padding: 10px;
        text-align: right;
    }   

    .e88{
        text-align: center;
        color: #600202;
    }
</style>