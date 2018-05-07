<?php 
require_once '../../Modelos/grupo-investigacion-modelo.php';
$grupoinv= new GrupoInv();
$rsGrupo=$grupoinv->getAll();
require_once '../../Vistas/Investigaciones/registrar-vista.php';
 ?>