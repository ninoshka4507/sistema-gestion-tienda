<?php
    session_start();
    if(isset($_SESSION['correo'])) {
        header("Location: bienvenido.php");
    }
    echo "<div class='titulo'>Login Administradores</div><br>";
    echo "<HR noshade align='center'><br>";
    echo "<div class='new'>
    </div>
    <br><br>";
?>

<html>
    <head>
        <title>Login</title>        
        <script src="js/jquery-3.3.1.min.js"></script>
        <script>

            function valida() {
            var usuario = document.forma01.user.value;
            var contraseña = document.forma01.pass.value;
            
            if((!usuario)||(!contraseña)) {
                $('#mensaje').html('Faltan campos por llenar');
                setTimeout("$('#mensaje').html('')",5000);
                return false;
            }
            else {
                var user = $("#user").val();
                var pass = $("#pass").val();
                if(user && pass) {
                    $.ajax ({
                            url     : 'Funciones/valida_usuario.php?user='+user+'&pass='+pass,
                            type    : 'post',
                            datatype : 'text',
                            data    : {'user' : user, 'pass' : pass},
                            success : function(res) {
                                if (res == 1) {
                                    window.location.href = "bienvenido.php";
                                } else {
                                    $('#mensaje').html('Usuario incorrecto');
                                    setTimeout("$('#mensaje').html('')",5000);
                                }
                        },error: function() {
                            alert('Error archivo no encontrado...');
                        }
                    });
                }
                return false;
                }
            }
            //Evitar que se envie con tecla enter
            $(document).ready(function() {
                $("form").keypress(function(e) {
                    if (e.which == 13) {
                        return false;
                    }
                });
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
            
            body {
                background-color: #D6E5E3;
            }

            .login{
                width: 500px;
                height: 550px;
                background-color: white;
                border-radius: 15px;
                position: absolute;
                top: 62%;
                left: 50%;
                transform: translate(-50%,-50%);
                box-shadow: 0px 1px 10px 1px #9FD8CB;
                overflow: hidden;
                display: inline-block;  
            }  

            .login_top{
                font-family: system-ui;
                height: 40%;
                background: #9FD8CB;
                border-radius: 5px 5px 0 0;
                color: #2D3319;
                font-size: 30px;
                font-weight: 600;
                align-items: center;
                justify-content: center;
                
            }
            .login_bot{
                height: 60%;
                height: 85%;
                background: #fff;
                border-radius: 5px;
                box-shadow: 0px 4px 10px 1px rgba(0,0,0,0.1);
            }
            .f_login{
                width: 100%;
                height: 80%;
                display:inline-block;
                margin: auto;
                opacity: 0.75;
                pointer-events: none;
            }
            .f_login img{
                max-width: 100%;
                max-height: 100%;
                display: block;
                pointer-events: none;
                
            }

            .login_bot form{
                padding: 30px 25px 45px 25px;
            }
            .imagen{
                height: 60%;
                width: 50%;
                pointer-events: none;
            }
            .login_bot form .row{
                height: 45px;
                margin-bottom: 20px;
                position: relative;
            }
            .login_bot form .row input{
                height: 105%;
                width: 100%;
                outline: none;
                padding-left: 60px;
                border-radius: 5px;
                border: 1px solid #917FB3;
                font-size: 16px;
                transition: all 0.3s ease;
                font-family: system-ui;
            }
            form .row input:focus{
                border-color: #9FD8CB;
                box-shadow: inset 0px 0px 2px 2px #9FD8CB;
            }
            form .row input::placeholder{
                color: #999;
            }
            .login_bot form .row i{
                position: absolute;
                width: 47px;
                height: 100%;
                color: #fff;
                font-size: 18px;
                background: #9FD8CB;
                border: 1px solid #9FD8CB;
                border-radius: 5px 0 0 5px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .login_bot form .pass{
                margin: -8px 0 20px 0;
            }

            .login_bot form .button input{
                color: #fff;
                font-size: 20px;
                font-weight: 500;
                padding-left: 0px;
                background: #9FD8CB;
                border: 1px solid #517664;
                cursor: pointer;
                margin-top: 10px;
                font-family: system-ui;
            }
            form .button input:hover{
                background: #517664;
                border: 1px solid #917FB3;
                font-weight: bold;
                
            }
            h2{
                font-family: system-ui;
                font-size: 21px;
            }
            ::selection {
                color: #2D3319;
                background: #D6E5E3;
            }
            #mensaje {
                height:20px;
                line-height:20px;
                color: #2D3319;
                font-size: 20px;
                font-weight: bold;
                width: 250px;
                text-align: center;
                margin: auto;
            }

        </style>
    </head>
    <body>
        <div class='login'>
            <div class='login_top' align="center">
                <div class="f_login">
                    <img src="Imagenes\login_logo.png" alt="">
                </div><br>   
                <h2>
                    Bienvenidx
                </h2>
            </div>
            <div class="login_bot">
                <form name="forma01" method="POST">
                <div class='row'>
                    <i>
                        <img src="Imagenes\correo.png" class="imagen" alt="">
                    </i>
                    <input type="email" name="user" id="user" placeholder='Correo'>
                </div>
                <div class='row'>
                    <i>
                        <img src="Imagenes\contrasena.png" class="imagen" alt="">
                    </i>
                    <input type='password' name='pass' id="pass" placeholder='Contraseña'>
                </div>
                <div class='row button'>
                    <input onclick='return valida();' type='submit' value='Login'>
                </div>
                <div id='mensaje'></div>
                </form>
                
            </div>
                
        </div>
    </body>
</html>