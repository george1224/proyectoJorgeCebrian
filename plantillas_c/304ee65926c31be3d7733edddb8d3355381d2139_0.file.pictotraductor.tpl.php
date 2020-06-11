<?php
/* Smarty version 3.1.36, created on 2020-06-11 13:40:37
  from 'C:\xampp\htdocs\pruebaComposer\plantillas\pictotraductor.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ee21835062cb9_95719567',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '304ee65926c31be3d7733edddb8d3355381d2139' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pruebaComposer\\plantillas\\pictotraductor.tpl',
      1 => 1591875628,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee21835062cb9_95719567 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
                /*background-image: url("./imagenesFondo/espacio.jpg");*/
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
            /*#msj, span, p{
                color: white;
            }*/
        </style>
    </head>
    <body>   
    <center><h1>"El Fraseador"</h1></center>
        <?php if ($_smarty_tpl->tpl_vars['usuarioBD']->value !== null) {?>
        <span>Bienvenido usuario: <?php echo $_smarty_tpl->tpl_vars['usuarioBD']->value->getNombreUsuario();?>
</span>
    <?php }?>
    <hr />
    <?php if ($_smarty_tpl->tpl_vars['msjInfo']->value !== null) {?>
        <span><?php echo $_smarty_tpl->tpl_vars['msjInfo']->value;?>
</span>
    <?php }?>
    <form action="pictotraductor.php" method="POST">
        <center><span>Introduzca la frase:</span><br/><textarea rows="6" cols="40" name="textoTraducir" placeholder="Escriba aquí"></textarea>
            <input type="hidden" name="userName" value="<?php echo $_smarty_tpl->tpl_vars['usuarioBD']->value->getNombreUsuario();?>
"/>
            <input type="submit" name="submitPictotraductor" value="Traducir"/><br/>
            <input type="submit" name="submitPictotraductor" value="Añadir a Frases Favoritas" />
            <input type="submit" name="submitPictotraductor" value="Ir a Frases Favoritas" />   
            <input type="submit" name="submitPictotraductor" value="Cerrar sesion" /></center>
    </form>
    <hr/>
    <span style="color:aquamarine">Resultado:</span>
                <?php if ($_smarty_tpl->tpl_vars['pictogramas']->value !== null) {?>
                    <p><?php echo $_smarty_tpl->tpl_vars['fraseUser']->value;?>
</p>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pictogramas']->value, 'contenido', false, 'datosArray');
$_smarty_tpl->tpl_vars['contenido']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['datosArray']->value => $_smarty_tpl->tpl_vars['contenido']->value) {
$_smarty_tpl->tpl_vars['contenido']->do_else = false;
?>
                    <?php if ($_smarty_tpl->tpl_vars['contenido']->value !== null) {?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['contenido']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['contenido']->value;?>
"/>
                    <?php }?>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php }?>
    <br />
</body>
</html><?php }
}
