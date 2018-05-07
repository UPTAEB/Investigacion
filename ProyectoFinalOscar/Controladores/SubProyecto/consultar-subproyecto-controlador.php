<?php

if (!empty($_POST))
	if (isset($_POST["descripcion"])) {
		require_once '../../Modelos/subproyecto-modelo.php';
		$objUsuario = new SubProyecto();
		$objUsuario->setDescripcion($_POST['descripcion']);
		$r1=$objUsuario->consultarsubproyecto();
		$mensaje = '';
		if ($r1['estatus']) { //verificamos si se ejecuto correctamente el metodo del modelo
			require_once '../../Vistas/SubProyecto/cargar-vista.php';
		}else{//si hay un error al consultar
			$mensaje = 'Error al consultar el Usuario, contacte con el soporte';
			require_once '../../Vistas/mensaje-vista.php';
		}
	}
?>