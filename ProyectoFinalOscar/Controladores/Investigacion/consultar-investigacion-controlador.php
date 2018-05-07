<?php
		require_once '../../Modelos/investigaciones-modelos.php';
		$objUsuario = new Investigaciones();
		$r1=$objUsuario->consultarInvestigaciones();
		$mensaje = '';
		if ($r1['estatus']) { //verificamos si se ejecuto correctamente el metodo del modelo
			require_once '../../Vistas/Investigaciones/cargar-vista.php';
		}else{//si hay un error al consultar
			$mensaje = 'Error al consultar el Usuario, contacte con el soporte';
			require_once '../../Vistas/mensaje-vista.php';
		}
?>