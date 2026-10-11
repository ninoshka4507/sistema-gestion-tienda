<?php
  require "funciones/conecta.php";
  $con = conecta();

  //Recibe variables
  $id = $_REQUEST['id'];

  $sql = "SELECT * FROM productos WHERE id = $id";

  $res = $con->query($sql);

  $row = $res->fetch_array();
  $nombre2 = $row["nombre"];
  $codigo = $row["codigo"];
  $descripcion = $row["descripcion"];
  $costo = $row["costo"];
  $inventario = $row["stock"];

  echo "<div class='titulo'>Edición de Productos</div><br>";
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

?>

<html>
    <head>
        <title>Edición de Productos</title>
        <script src="JS/jquery-3.3.1.min.js"></script>
        <script>
        //Evitar que se envie con tecla enter
            $(document).ready(function() {
                $("form").keypress(function(e) {
                    if (e.which == 13) {
                        return false;
                    }
                });
            });

            function valida() {
                var nombre = document.getElementById("nombre").value;
                var codigo = document.getElementById("codigo").value;
                var descripcion = document.forma01.descripcion.value;
                var costo = document.forma01.costo.value;
                var inventario = document.forma01.inventario.value;

            
                if((nombre&&codigo&&descripcion&&costo&&inventario)){
                    return true;
                }else{
                    $('#mensaje').html('Faltan campos por llenar');
                    setTimeout("$('#mensaje').html('')",5000);
                    return false;
                }
            }   

            function validarCodigo() {
                var codigo = $('#codigo').val();
                var id = $('#id').val();
                if(codigo && id) {
                    $.ajax ({
                        url     : 'Funciones/valida_codigo.php',
                        type    : 'post',
                        datatype : 'text',
                        data    : {'id' : id, 'codigo' : codigo},
                        success : function(res) {
                            if (res == 1) {
                                $('#mensaje2').html('El codigo '+codigo+' ya existe, intente con otro diferente').css("color", "red");
                                //borrar contenido del input correo
                                $('#correo').val('');
                            } else {
                                $('#mensaje2').html('El codigo '+codigo+' esta disponible').css("color", "#517664");
                            }
                            setTimeout("$('#mensaje2').html('')", 5000);
                        },error: function(){
                            alert('Error archivo no encontrado...');
                    }
                    });
                }
            }

            $(document).on('change','input[type="file"]',function(){
                var fileName = this.files[0].name;
                var ext = fileName.split('.').pop();
                
                // Convertimos en minúscula porque 
                // la extensión del archivo puede estar en mayúscula
                ext = ext.toLowerCase();
                    
                // console.log(ext);
                switch (ext) {
                    case 'jpg':
                    case 'jpeg':
                    case 'png': break;
                    default:
                    alert('El archivo no tiene la extensión adecuada');
                    this.value = ''; // reset del valor
                    this.files[0].name = '';
                }
            });
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

            label{
                display: inline-block;
                width: 80px;
                color: #517664;
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

            body {
                background-color: #D6E5E3;
            }
            
            a {
                color: #2D3319;
            }

            a:hover {
                color: #2D3319;
                font-weight: bold;
            }

            a:active {
                color: #517664;
            }

            textarea{
                resize: none;
                rows:4;
                cols=50;
            }
            #mensaje {
                height:20px;
                line-height:20px;
                color: #517664;
                font-size: 20px;
                font-weight: bold;
                width: 250px;
                text-align: center;
                text-decoration: underline;
                margin:2px auto;
            }

            #mensaje2 {
                height:20px;
                line-height:22px;
                color: #517664;
                font-size: 15px;
                font-weight: bold;
                width: 250px;
                text-align: center;
                float: right;
                position: relative;
                margin:2px auto;
            }

            ::selection {
                color: #2D3319;
                background: #9FD8CB;
            }
        </style>
    </head>
    <body>
    <br>
    <br>
        <br>
        <form enctype="multipart/form-data" name="forma01" action="productos_salvaEdita.php" method="POST" align="center">
        <input type="hidden" name="id" id="id" value=<?php echo $id ?>>
        <label>Nombre</label>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre del producto" value="<?php echo $nombre2 ?>">
        <br>
        <label style="margin: 2px 0px 0px 430px;">Codigo</label>
        <input onblur="validarCodigo();" type="text" name="codigo" id="codigo" placeholder="Codigo del producto" value="<?php echo $codigo ?>">
        <div id='mensaje2' style="margin: 2px 180px 0px 0px;"></div>
        <br>
        <label for="descripcion">Descripcion</label>
            <textarea type="text" name="descripcion" id="descripcion" rows="4" cols="50"><?php echo $descripcion ?>
            </textarea>
        <br>
        <label>Costo</label>
        <input type="text" name="costo" id="costo" placeholder="Costo del producto" value="<?php echo $costo ?>">
        <br>
        <label>Inventario</label>
        <input type="text" name="stock" id="inventario" placeholder="Inventario del producto" value="<?php echo $inventario ?>">
        <br>
        <label>Imagen</label>
            <input type="file" name="imagen" accept="image/jpeg,image/jpg,image/png">
        <br>
            <input style='background-color: #CACFD6; width: 150px; margin: 10px auto;' type='submit' onclick=' return valida();' value='Enviar'>
        </form>
        <div id='mensaje'></div>
    </body>
</html>