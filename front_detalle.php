<?php
    echo "<div class='titulo'>ZSneakersZ</div><br>";
    echo "<hr class='linea'>";
    include 'Funciones/front_menu_inicio.php';
    echo "<br><HR noshade align='center'><br>";
    echo "<div class='back'>
        <a href=\"front_inicio.php\">
        <img class='imagen' src='Imagenes\back.png' alt=''>
            Regresar al inicio
        </a>
    </div>
    <br><br>";
?>
<head>
    <title>Detalle</title>
    <script src= "JS/jquery-3.3.1.min.js"> </script>
    <script>
        function reloadpage(id){
            var id=id;  
            var cant=  $('#number').val();
            window.location.href = 'carrito_salva.php?id='+id+'&cant='+cant;
        }
    </script>
    <script>
        function actualizarSubtotal(costo) {
            var input = document.getElementById("number");
            var cantidad = parseInt(input.value);
            var subtotal = cantidad * costo;
            document.getElementById("subtotal").innerHTML = "Subtotal: $" + subtotal;
        }
    </script>
</head>

<?php 
    require "Funciones/conecta.php";
    $con = conecta();
    $id = $_REQUEST['id'];
    
    $sql = "SELECT * FROM productos WHERE id = $id AND status = 1 AND eliminado = 0";
    $res = $con->query($sql);

?>
<?php 
    while($mostrar = $res->fetch_array() ){
        $nombre = $mostrar["nombre"];
        $desc = $mostrar["descripcion"];
        $codigo = $mostrar["codigo"];
        $costo = $mostrar["costo"];
        $inventario = $mostrar["stock"];
        $estado=$mostrar['status'];
        $mostrar_estado = ($mostrar['status'] == 1) ? 'Activo' : 'Inactivo';
        $img=($mostrar["archivo"]);
    }

?>
<body>
<div class="Cajagrandedetalle"> 
        
        <div class="imagenss"><img src='imagenes\Productos\<?php echo "$img" ?> ' alt="" width="300px"><br><br><br>
        </div>
        <div>
            <h1><?php echo "$nombre";?></h1>  
        </div>
        <div class="infoextra">
        <table>
        <tr class=filas2>
            <th><h2 class="subti">Codigo  :</h2><br></th>
            <th><h3 class="subticod" ><?php echo "$codigo";?></h3></th>
        </tr>


        <tr class=filas2>
                <th><h2 class="subti">Descripcion:</h2><br></th>
                <th><h3 class="subticod" ><?php echo "$desc";?></h3></th>
        </tr>

        <tr class=filas2>
                <th><h2 class="subti">Costo  :</h2><br></th>
                <th><h3 class="subticod" ><?php echo "$costo";?></h3></th>
        </tr>

        <tr class=filas2>
                <th><h2 class="subti">Stock:</h2><br></th>
                <th><h3 class="subticod" ><?php echo "$inventario";?></h3></th>
        </tr>
        </table>

            <br>
        </div>
        <div>

        
    </div>
 
    <div class="AgregarCarrito">
        
    <div class="subtotal" id="subtotal">Subtotal: <br></div>

        <p>Cantidad: <input type="number" id="number" value="1" onblur="actualizarSubtotal(<?php echo $costo; ?>)"></p>
        
    <!--/script-->
        <button onclick="reloadpage(<?php echo $id?>)">Agregar al carrito</button> <br><br><br><br>
    </div>
</div>
    <?php
        include "Funciones/front_footer.php";
    ?>

    

    
    
</body>

    

<style>
    .titulo{
        color: #2A2F4F;
        text-align: center;
        font-weight: bold;
        font-size: 40px; 
        margin-top: 30;
    }    
    .subti {
        color: black;
        font-weight: bold;
        margin-bottom: 5px;
 
    }
    
    .subticod {
        color: black;

    }
    .filas2 {
        display: table-row;
        background-color: #9FD8CB;
    }
    .celdas {
        display: table-cell;
        border: 2px solid black;
        text-align: center;
        vertical-align: middle;
        width: 15%;
    }
    .infoextra{
        background-color: #D6E5E3;
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

    .AgregarCarrito button:hover{
        background-color: #517664;
        color: white;
    }

    .Cajagrandedetalle table {
        margin-left: 0 auto;
        text-align: center;
        border-collapse: collapse;
        background-color: #F0F0F0;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
  
    h1{
        font-family: "Times New Roman", Times, serif;
        text-align: center;
        color: black;
        margin-bottom: 20px;
    }

    h2{
        font-family:Arial, Helvetica, sans-serif ;
        font-size: 14px;
        color: black;
        text-align: left;
        display: inline;
        line-height: 1.5;
    }
    h3{
        font-size: 16px;
        color: black;
        display: inline;
        font-weight: lighter;
        text-align: center;
    }
  

    button{
        background-color: white;
        width: 60%;
        color: black;
        border: 2px solid black;
        height: 20px;
        cursor: pointer;
        transition: background-color 2s ease;
    }

    button:hover{
        background-color: gray;
    }
  
    .Cajagrandedetalle {
        width: 500px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 10px;
        align-items: center;
    }

    .AgregarCarrito {
        margin-left: 100px;
        top: 340px;
        width: 300px;
        height: 200px;
        background-color: #9FD8CB;
    }
  
    .AgregarCarrito p{
        margin-top: 40px;
        text-align: center;
    }

    .AgregarCarrito input{
        text-align: center;
        width: 40px;
    }

    .AgregarCarrito button{
        margin-left: 25%;
    }

    .subtotal{
        width: 100%;
        color: black;
        font-weight: bold;
        text-align: center;
        font-size: x-large;
    }
</style>