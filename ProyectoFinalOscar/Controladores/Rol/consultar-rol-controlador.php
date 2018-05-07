<?php

if (!empty($_POST))
	if (isset($_POST["nombre_rol"])) {
		require_once '../../Modelos/rol-modelo.php';
		$objUsuario = new Rol();
		$objUsuario->setNombre_Rol($_POST['nombre_rol']);
		$r1=$objUsuario->consultarRol();
		$mensaje = '';
		if ($r1['estatus']) { //verificamos si se ejecuto correctamente el metodo del modelo
			require_once '../../Vistas/Rol/cargar-vista.php';
		}else{//si hay un error al consultar
			$mensaje = 'Error al consultar el Usuario, contacte con el soporte';
			require_once '../../Vistas/mensaje-vista.php';
		}
	}
?>