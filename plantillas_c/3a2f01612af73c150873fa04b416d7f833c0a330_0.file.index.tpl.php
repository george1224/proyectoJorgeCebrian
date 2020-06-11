<?php
/* Smarty version 3.1.36, created on 2020-06-10 16:15:32
  from 'C:\xampp\htdocs\pruebaComposer\plantillas\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ee0eb0487d563_23384305',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a2f01612af73c150873fa04b416d7f833c0a330' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pruebaComposer\\plantillas\\index.tpl',
      1 => 1591791516,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee0eb0487d563_23384305 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pictotraductor</title>  
        <style>
            html{
                min-height: 100%;
            }
            body{
                /*background-image: url("./imagenesFondo/espacio.jpg");*/
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
            <?php if ($_smarty_tpl->tpl_vars['errorInicioSesion']->value !== null) {?>
                <span><?php echo $_smarty_tpl->tpl_vars['errorInicioSesion']->value;?>
</span>
            <?php } elseif ($_smarty_tpl->tpl_vars['msjInfo']->value !== null) {?>
                <span><?php echo $_smarty_tpl->tpl_vars['msjInfo']->value;?>
</span>
            <?php }?>
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
</html><?php }
}
