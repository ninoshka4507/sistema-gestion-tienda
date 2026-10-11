<?php
    echo "<div class='titulo'>ZsneakersZ</div><br>";
    echo "<hr class='linea'>";
    include 'Funciones/front_menu_inicio.php';
    echo "<br><HR noshade align='center'><br>";
?>

   
<div class="promociones">
    <?php
        require "Funciones/conecta.php";
        $con= conecta();     
        $sql= "SELECT*FROM promociones where  eliminado != 1   ORDER BY RAND() * (SELECT MAX(ID) FROM promociones) LIMIT 1";
        $res= $con->query($sql);
        while($mostrar = $res->fetch_array() ){
            $nombre = $mostrar["nombre"];
            $img=($mostrar["archivo"]);
        }
    ?>
    <div class="imagenssmues"><img src='imagenes\Promociones\<?php echo "$img" ?> ' alt="" width="600px">
        <br>
    </div>
</div>

<div class="vistaproductos">
    <?php   
        $sql= "SELECT*FROM productos where eliminado != 1 ORDER BY RAND() * (SELECT MAX(ID) FROM promociones) LIMIT 6";
        $res= $con->query($sql);
        while($row= $res->fetch_array()){
            $id=$row['id'];
            $foto=$row['archivo'];
            $nombre=$row['nombre'];
            $cost=$row['costo'];
    ?>        
    <div class="contentprod">
        <img class="imgpv" src='Imagenes\Productos\<?php echo "$foto" ?> ' alt="" width="300px">
        <div class="textocontprod">
            <p><?php echo "$nombre" ?></p>
            <p>$<?php echo "$cost" ?></p>
        </div>
    
    <div class="textocontprodlinks">
        <button onclick="redirectToPage(<?php echo $id ?> )">Comprar</button>
        <br>
        <br><br>
    </div>    
</div>
        
        
        <?php 
        }
            include "Funciones/front_footer.php";
        ?>

            
    <title>Inicio</title>
    <script src="JS/jquery-3.3.1.min.js"></script>
    <script>
            function redirectToPage(id){
                window.location.href = 'front_detalle.php?id=' + id;
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

    .encabezado {
        display: table-row;
        text-align: center;
        line-height: 50px;
        font-weight: bold;
        height: 50px;
        background-color: lightskyblue;
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
        display: table-cell;
        border: 2px solid black;
        text-align: center;
        vertical-align: middle;
        width: 15%;
    }

    body{
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
        margin-top: 30px;
        text-align: center;
    }

    .footerprod{
        margin-top: 800px;
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
        width: 600px;
        background-color: #ffffff;
    }
    .imagenssmues{
        width: 600px;
        height: 250px;
        margin: 0 auto;
        margin-top: 0px;
    }


    .vistaproductos{
        margin: 50px auto;
        width: 1200px;
        height: 300px;
    }


    .contentprod{
        position: relative;
        width: 250px;
        height: 300px;
        float: left;
        margin-top: 80px;
        margin-left: 48px;
        margin-right: 90px;
        background-color: #fff; 
        border: 2px solid #517664;
        font-family: system-ui;

    }

    .imgpv{
        margin-left: 40px;
        width: 170px; 
        height: auto;
        align-items: auto;
        margin-top: 20px;
    }

    .textocontprod p{
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
        bottom: 0;
        width: 60%;
        padding: 10px;
    }

    .textocontprodlinks{
        position: absolute;
        bottom: 0; 
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