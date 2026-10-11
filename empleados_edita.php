<?php
    require "funciones/conecta.php";
    $con = conecta();

    //Recibe variables
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM empleados WHERE id = $id";

    $res = $con->query($sql);

    $row = $res->fetch_array();
    $nombre2 = $row["nombre"];
    $apellidos = $row["apellidos"];
    $correo = $row["correo"];
    $rol = $row["rol"];

    echo "<div class='titulo'>Edición de Administradores</div><br>";
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

?>

<html>
    <head>
        <title>Edición de Administradores</title>
        <script src="js/jquery-3.3.1.min.js"></script>
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
            var nombres = document.getElementById("nombres").value;
            var apellidos = document.getElementById("apellidos").value;
            var correo = document.forma01.correo.value;
            var rol = document.forma01.rol.value;
            
            if((nombres&&apellidos&&correo&&password&&rol!=0)){
                return true;
            }else{
                $('#mensaje').html('Faltan campos por llenar');
                setTimeout("$('#mensaje').html('')",5000);
                return false;
            }
        }

        function validarCorreo() {
            var correo = $('#correo').val();
            var id = $('#id').val();
            if(correo && id) {
            $.ajax ({
                url     : 'Funciones/valida_correo.php',
                type    : 'post',
                datatype : 'text',
                data    : {'id' : id, 'correo' : correo},
                success : function(res) {
                if (res == 1) {
                    $('#mensaje2').html('El correo '+correo+' ya existe, intente con otro diferente').css("color", "red");
                    //esta linea borra el contenido del input del correo
                    $('#correo').val('');
                } else {
                    $('#mensaje2').html('El correo '+correo+' esta disponible').css("color", "517664");
                }
                    setTimeout("$('#mensaje2').html('')", 5000);
                },error: function() {
                alert('Error archivo no encontrado...');
                }
            });
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
        <form enctype="multipart/form-data" name="forma01" action="empleados_salvaEdita.php" method="POST" align="center">
        <input type="hidden" name="id" id="id" value=<?php echo $id ?>>
        <label>Nombre(s)</label>
            <input type="text" name="nombres" id="nombres" placeholder="Escribe los nombre(s)" value="<?php echo $nombre2 ?>">
        <br>
        <label>Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" placeholder="Escribe los apellidos" value="<?php echo $apellidos ?>">
        <br>
        <label for="correo" style="margin: 2px 0px 0px 430px;">Correo</label>
            <input onblur="validarCorreo();" type="email" name="correo" id="correo" placeholder="Escribe tu correo" value=<?php echo $correo ?>>
        <div id='mensaje2' style="margin: 2px 180px 0px 0px;"></div>
        <br>
        <label>Contraseña</label>
            <input type="password" name="pass" id="password" placeholder="Escribe la contraseña">
        <br>
        <label>Rol</label>
            <?php
                if($rol == 1) {
                    echo "<select id='rol' name='rol'>
                    <option align='center' value='0'>Selecciona</option>
                    <option align='center' value='1' selected>Gerente</option>
                    <option align='center' value='2'>Ejecutivo</option>			
                    </select>";
                }else{
                    echo "<select id='rol'name='rol'>
                    <option align='center' value='0'>Selecciona</option>
                    <option align='center' value='1'>Gerente</option>
                    <option align='center' value='2' selected>Ejecutivo</option>			
                    </select>";
                }
            ?>
        <br>
        <label>Foto</label>
          <input type="file" name="foto" id="name" accept="image/jpeg,image/jpg,image/png">
        <br>
        <input style="background-color: #CACFD6; width: 150px; margin: 10px auto;" type='submit' onclick=' return valida();' value='Editar'>
        </form>
        <div id='mensaje'></div>
    </body>
</html>