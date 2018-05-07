<?php 
require_once '../../Modelos/usuario-modelo.php';
$usuario = new Usuario();
$rsUsuario=$usuario->getAll();
require_once '../../Modelos/grupo-investigacion-modelo.php';
$grupoinv = new GrupoInv();
$rsGrupo=$grupoinv->getAll();

require_once '../../Vistas/Usuario-Grupo/registrar-vista.php'
 ?>