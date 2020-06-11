<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pictotraductor</title>      
        <style>
            img {
                width: 200px;
                height: 200px;
                float: left;
            }
            html{
                min-height: 100%;
            }
            body{
                background-image: url("./imagenesFondo/espacio.jpg");
                background-repeat: no-repeat;
                background-size: cover;
                align-items: center;
            }
            textarea{
                display:inline-block;
                padding-right: 100px;
            }
            form input[type="submit"]{
                display:inline-block;
            }
            h1{
                font-family: Verdana;
                color: #F416FF;
                font-style: italic
            }
            #msj, span, p{
                color: white;
            }
        </style>
    </head>
    <body>   
    <center><h1>"El Fraseador"</h1></center>
        {if $usuarioBD !== null}
        <span>Bienvenido usuario: {$usuarioBD->getNombreUsuario()}</span>
    {/if}
    <hr />
    {if $msjInfo !== null}
        <span>{$msjInfo}</span>
    {/if}
    <form action="pictotraductor.php" method="POST">
        <center><span>Introduzca la frase:</span><br/><textarea rows="6" cols="40" name="textoTraducir" placeholder="Escriba aquí"></textarea>
            <input type="hidden" name="userName" value="{$usuarioBD->getNombreUsuario()}"/>
            <input type="submit" name="submitPictotraductor" value="Traducir"/><br/>
            <input type="submit" name="submitPictotraductor" value="Añadir a Frases Favoritas" />
            <input type="submit" name="submitPictotraductor" value="Ir a Frases Favoritas" />   
            <input type="submit" name="submitPictotraductor" value="Cerrar sesion" /></center>
    </form>
    <hr/>
    <span style="color:aquamarine">Resultado:</span>
                {if $pictogramas !== null}
                    <p>{$fraseUser}</p>
                {foreach $pictogramas as $datosArray => $contenido}
                    {if $contenido !== null}
                    <img src="{$contenido}" alt="{$contenido}"/>
                    {/if}
                {/foreach}
            {/if}
    <br />
</body>
</html>