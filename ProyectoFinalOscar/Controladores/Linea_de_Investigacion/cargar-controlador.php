<?php
require_once '../../Modelos/programa-modelo.php';
$id_programa = $_POST['id_programa'];
$lineainv = new Programa();
$rsPNF=$lineainv->getAll();
if (!empty($_POST))
	if (isset($_POST["nombre"])) {
		require_once '../../Modelos/linea_investigacion-modelo.php';
		$lineainv = new LineaInv();
		$lineainv->setNombre($_POST['nombre']);
		$r1=$lineainv->consultar();
		$mensaje = '';
		if ($r1['estatus']) { //verificamos si se ejecuto correctamente el metodo del modelo
			require_once '../../Vistas/Linea-Investigacion/actualizar-vista.php';
		}else{//si hay un error al consultar
			$mensaje = 'Error al consultar el Usuario, contacte con el soporte';
			require_once '../../Vistas/mensaje-vista.php';
		}
	}
?>