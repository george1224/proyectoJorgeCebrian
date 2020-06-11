<?php
/* Smarty version 3.1.36, created on 2020-06-10 17:09:57
  from 'C:\xampp\htdocs\pruebaComposer\plantillas\frases.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ee0f7c53b6dc6_21761979',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7391a5bb1e94ed0a32f4e5ffcc7ef451d26af287' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pruebaComposer\\plantillas\\frases.tpl',
      1 => 1591801794,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee0f7c53b6dc6_21761979 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
                /*background-image: url("./imagenesFondo/espacio.jpg");*/
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
           /* #msj, span, p{
                color: white;
            }*/
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
        <?php if ($_smarty_tpl->tpl_vars['user']->value !== null) {?>
        <span>Usuario: <?php echo $_smarty_tpl->tpl_vars['user']->value->getNombreUsuario();?>
</span>     
    <?php }?>
    <hr />
    <?php if ($_smarty_tpl->tpl_vars['msj']->value !== null) {?>
        <span><?php echo $_smarty_tpl->tpl_vars['msj']->value;?>
</span>     
    <?php }?>
    <form id="frasesPHP" action="frases.php" method="POST">
        <center><span>Introduzca la frase:</span><br/><textarea rows="6" cols="40" name="textoFrase" placeholder="Escriba aquí"></textarea><br/>
            <input type="submit" name="submitFrases" value="Borrar" />
            <input type="submit" name="submitFrases" value="Modificar"/>
            <input type="submit" name="submitFrases" value="Imprimir"/>
        </center>
        <hr />
        <br />
        <span>Listado de Frases Favoritas: </span><br />
        <?php if ($_smarty_tpl->tpl_vars['frasesUser']->value !== null) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['frasesUser']->value, 'contenido', false, 'datosArray');
$_smarty_tpl->tpl_vars['contenido']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['datosArray']->value => $_smarty_tpl->tpl_vars['contenido']->value) {
$_smarty_tpl->tpl_vars['contenido']->do_else = false;
?>
                <div>
                    <p><input type="checkbox" name="frasesLista[]" value="<?php echo $_smarty_tpl->tpl_vars['contenido']->value->getFraseUsuario();?>
"> <?php echo ucfirst($_smarty_tpl->tpl_vars['contenido']->value->getFraseUsuario());?>
</p><br/>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['contenido']->value->getPalabrasFrases(), 'contenidoFrases', false, 'numFrasesIndices');
$_smarty_tpl->tpl_vars['contenidoFrases']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['numFrasesIndices']->value => $_smarty_tpl->tpl_vars['contenidoFrases']->value) {
$_smarty_tpl->tpl_vars['contenidoFrases']->do_else = false;
?>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['contenidoFrases']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['contenidoFrases']->value;?>
"/>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php }?>        
    </form>
    <br />
    <form id="pictotraductorPHP" action="pictotraductor.php" method="POST">
        <input type="submit" name="submitVolver" value="Volver"/>
    </form>
</body>
</html><?php }
}
