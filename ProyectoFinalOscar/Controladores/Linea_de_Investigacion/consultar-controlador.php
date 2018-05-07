<?php
		require_once '../../Modelos/linea_investigacion-modelo.php';
		$lineainv = new LineaInv();
		$r1=$lineainv->consultarLineaInv();
		$mensaje = '';
		if ($r1['estatus']) { //verificamos si se ejecuto correctamente el metodo del modelo
			require_once '../../Vistas/Linea-Investigacion/cargar-vista.php';
		}else{//si hay un error al consultar
			$mensaje = 'Error al consultar el Usuario, contacte con el soporte';
			require_once '../../Vistas/mensaje-vista.php';
		}
?>