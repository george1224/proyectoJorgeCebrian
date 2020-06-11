<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pictotraductor</title>      
        <style>
            img {
                width: 100px;
                height: 100px;
                margin-left: 10px;
                float: left;
                padding-bottom: 50px;
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
            #frasesPHP input[type="submit"]{
                display:inline-block;
            }
            div {
                display:block;
                left: 0px;
                margin-bottom: 150px;
            }
            h1{
                font-family: Verdana;
                color: #F416FF;
                font-style: italic
            }
            #msj, span, p{
                color: white;
            }
            #user{
                float: right;
            }
            #pictotraductorPHP input[type="submit"]{
                bottom: 0px;
                float: right;
                margin: 20px;
                margin-top: -40px;
            }
        </style>
    </head>
    <body>   
    <center><h1>"El Fraseador"</h1></center>
        {if $user !== null}
        <span>Usuario: {$user->getNombreUsuario()}</span>     
    {/if}
    <hr />
    {if $msj !== null}
        <span>{$msj}</span>     
    {/if}
    <form id="frasesPHP" action="frases.php" method="POST">
        <center><span>Introduzca la frase:</span><br/><textarea rows="6" cols="40" name="textoFrase" placeholder="Escriba aquí"></textarea><br/>
            <input type="submit" name="submitFrases" value="Borrar" />
            <input type="submit" name="submitFrases" value="Modificar"/>
            <input type="submit" name="submitFrases" value="Exportar PDF"/>
        </center>
        <hr />
        <br />
        <span>Listado de Frases Favoritas: </span><br />
        {if $frasesUser !== null}
            {foreach $frasesUser as $datosArray => $contenido}
                <div>
                    <p><input type="checkbox" name="frasesLista[]" value="{$contenido->getFraseUsuario()}"> {ucfirst($contenido->getFraseUsuario())}</p><br/>
                        {foreach $contenido->getPalabrasFrases() as $numFrasesIndices => $contenidoFrases}
                        <img src="{$contenidoFrases}" alt="{$contenidoFrases}"/>
                    {/foreach}
                </div>
            {/foreach}
        {/if}        
    </form>
    <br />
    <form id="pictotraductorPHP" action="pictotraductor.php" method="POST">
        <input type="submit" name="submitVolver" value="Volver"/>
    </form>
</body>
</html>