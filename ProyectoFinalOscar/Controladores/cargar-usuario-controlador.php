<?php

if (!empty($_POST))
	if (isset($_POST["cedula"])) {
		require_once '../Modelos/usuario-modelo.php';
		$objUsuario = new Usuario();
		$objUsuario->setCedula($_POST['cedula']);
		$r1=$objUsuario->consultar();
		$mensaje = '';
		if ($r1['estatus']) { //verificamos si se ejecuto correctamente el metodo del modelo
			require_once '../Vistas/Usuario/actualizar-usuario-vista.php';
		}else{//si hay un error al consultar
			$mensaje = 'Error al consultar el Usuario, contacte con el soporte';
			require_once '../Vistas/mensaje-vista.php';
		}
	}
?>
