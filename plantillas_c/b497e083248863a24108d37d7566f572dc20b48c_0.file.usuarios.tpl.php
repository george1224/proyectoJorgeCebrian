<?php
/* Smarty version 3.1.36, created on 2020-06-08 13:57:41
  from 'C:\xampp\htdocs\pruebaComposer\plantillas\usuarios.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_5ede27b545bfe7_14246704',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b497e083248863a24108d37d7566f572dc20b48c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\pruebaComposer\\plantillas\\usuarios.tpl',
      1 => 1591560947,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ede27b545bfe7_14246704 (Smarty_Internal_Template $_smarty_tpl) {
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
                background-image: url("./imagenesFondo/espacio.jpg");
                background-repeat: no-repeat;
                background-size: cover;
                align-items: center;
            }
            fieldset {
                width: 350px;
                margin-left: 38%;
                background-color: white;
            }
            fieldset span{
                color:#120EF4;
            }
            fieldset legend{
                color:#F40E15;
            }
            input{
                margin:8px 0;
                display:inline-block;
            }
            form input[type="submit"]{
                display:inline-block;
            }
            span {
                color: white;
            }
        </style>
    </head>
    <body>
        <?php if ($_smarty_tpl->tpl_vars['msjInfo']->value !== null) {?>
            <span><?php echo $_smarty_tpl->tpl_vars['msjInfo']->value;?>
</span>
        <?php }?>
        <fieldset>           
            <legend>Crear usuario</legend>
            <form action="usuarios.php" method="POST">
                <span>Nombre:</span> <input type="text" name="nombre" placeholder="Introduzca datos..."/><br/>
                <span>Contraseña:</span> <input type="text" name="pass" placeholder="Introduzca datos..."/><br/>
                <span>Nombre del tutor/a:</span> <input type="text" name="nombreTutor" placeholder="Introduzca datos..."/><br/>
                <span>Dirección:</span> <input type="text" name="direccion" placeholder="Introduzca datos..."/><br/>
                <span>Teléfono:</span> <input type="text" name="telef" placeholder="Introduzca datos..."/><br/>
                <span>Email:</span> <input type="text" name="email" placeholder="Introduzca datos..."/><br/>
                <span>Tipo de discapacidad:</span> <input type="text" name="tipoDiscapacidad" placeholder="Introduzca datos..."/><br/>
                <span>Grado de discapacidad:</span> <input type="text" name="gradoDiscapacidad" placeholder="Introduzca datos..."/><br/>
                <input class="userCreated" type="submit" name="userCreado" value="Crear usuario" /> 
            </form>                
            <form action="index.php" method="POST">
                <input class="volver" type="submit" name="volver" value="Volver" />
            </form>
        </fieldset>

    </body>
</html><?php }
}
