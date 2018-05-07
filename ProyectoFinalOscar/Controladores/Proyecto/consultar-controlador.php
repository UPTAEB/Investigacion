<?php 
		require_once '../../Modelos/proyecto-modelo.php';
		$objUsuario = new Proyecto();
		$r2=$objUsuario->consultarProyecto();
		$mensaje = '';
		if ($r2['estatus']) { //verificamos si se ejecuto correctamente el metodo del modelo
			require_once '../../Vistas/Proyecto/busqueda-vista.php';
		}else{//si hay un error al consultar
			$mensaje = 'Error al consultar el Proyecto, contacte con el soporte';
			require_once '../../Vistas/Proyecto/mensaje-vista.php';
		}
 ?>