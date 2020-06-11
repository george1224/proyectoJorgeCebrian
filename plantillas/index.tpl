<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pictotraductor</title>  
        <style>
            html{
                min-height: 100%;
            }
            body{
                background-image: url("./imagenesFondo/espacio.jpg");
                background-repeat: no-repeat;
                background-size: cover;
                align-items: center;
            }
            fieldset {
                width: 300px;
                height:130px;
                margin-left: 38%;
                background-color: white;
            }
            input {
                margin:8px 0;
                display:inline-block;
            }
            span{
                border: 1px black;
            }
            h1{
                font-family: Verdana;
                color: #F416FF;
                font-style: italic
            }
            fieldset span{
                color:#120EF4;
            }
            fieldset legend{
                color:#F40E15;
            }
            span {
                color: white;
            }
        </style>
    </head>
    <body>
        <div>
            <center><h1>Bienvenidos a "El Fraseador"</h1></center>
            <hr />
            {if $errorInicioSesion !== null}
                <span>{$errorInicioSesion}</span>
            {elseif $msjInfo !== null}
                <span>{$msjInfo}</span>
            {/if}
            <form action="index.php" method="POST">
                <fieldset>
                    <legend>Login</legend>
                    <span>Usuario:</span> <input type="text" name="name" placeholder="Introduzca datos..."/><br/>
                    <span>Contraseña:</span> <input type="text" name="pass" placeholder="Introduzca datos..."/><br/>
                    <input type="submit" name="login" value="Iniciar sesion" />       
                    &nbsp;&nbsp;<input type="submit" name="create" value="Crear usuario" />
                </fieldset>
            </form>
            <!--<h3>$mi_error}</h3>-->
        </div>
    </body>
</html>