<?php

if (!empty($_POST))
	if (isset($_POST["rif"])) {
		require_once '../Modelos/comunidad-modelo.php';
		$objUsuario = new Comunidad();
		$objUsuario->setRif($_POST['rif']);
		$r1=$objUsuario->consultar();
		$mensaje = '';
		if ($r1['estatus']) { //verificamos si se ejecuto correctamente el metodo del modelo
			require_once '../Vistas/actualizar-comunidad-vista.php';
		}else{//si hay un error al consultar
			$mensaje = 'Error al consultar el Usuario, contacte con el soporte';
			require_once '../Vistas/mensaje-vista.php';
		}
	}
?>