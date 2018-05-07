<?php 
require_once '../../Modelos/comunidad-modelo.php';
$comunidad= new Comunidad();
$rsComunidad= $comunidad->getAll();

require_once '../../Modelos/macroproyecto-modelo.php';
$macroproyecto = new Macroproyecto();
$rsMacroproyecto = $macroproyecto->getAll();

require_once '../../Modelos/linea_investigacion-modelo.php';
$lineainv = new LineaInv();
$rsLineaInv = $lineainv->getAll();

require_once '../../Vistas/Proyecto/registrar-vista.php';
 ?>