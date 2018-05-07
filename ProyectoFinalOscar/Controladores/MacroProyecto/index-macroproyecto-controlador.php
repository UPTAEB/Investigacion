	<?php 
require_once '../../Modelos/investigaciones-modelos.php';
$investigacion= new Investigaciones();
$rsInvestigacion= $investigacion->getAll();
require_once '../../Vistas/MacroProyecto/registrar-macroproyecto-vista.php'
 ?>