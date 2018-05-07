<?php
		require_once '../../Modelos/grupo-investigacion-modelo.php';
		$objUsuario = new GrupoInv();
		$r1=$objUsuario->consultarNombreUsuario();
		$mensaje = '';
		if ($r1['estatus']) { //verificamos si se ejecuto correctamente el metodo del modelo
			require_once '../../Vistas/Grupo-Investigacion/cargar-vista.php';
		}else{//si hay un error al consultar
			$mensaje = 'Error al consultar el Usuario, contacte con el soporte';
			require_once '../Vistas/mensaje-vista.php';
		}
?>