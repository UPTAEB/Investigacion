<?php

if (!empty($_POST))
	if (isset($_POST["nombre"])) {
		require_once '../Modelos/macroproyecto-modelo.php';
		$objUsuario = new Macroproyecto();
		$objUsuario->setNombre($_POST['nombre']);
		$r1=$objUsuario->consultar();
		$mensaje = '';
		if ($r1['estatus']) { //verificamos si se ejecuto correctamente el metodo del modelo
			require_once '../Vistas/actualizar-macroproyecto-vista.php';
		}else{//si hay un error al consultar
			$mensaje = 'Error al consultar el Usuario, contacte con el soporte';
			require_once '../Vistas/mensaje-vista.php';
		}
	}
?>