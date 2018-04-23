<?php 
if (!empty($_POST))
	if (isset($_POST["estado"])) {
		require_once '../../Modelos/proyecto-modelo.php';
		$objUsuario = new Proyecto();
		$objUsuario->setEstado($_POST['estado']);
		$r2=$objUsuario->consultarNombreUsuario();
		$mensaje = '';
		if ($r2['estatus']) { //verificamos si se ejecuto correctamente el metodo del modelo
			require_once '../../Vistas/Proyecto/busqueda-vista.php';
		}else{//si hay un error al consultar
			$mensaje = 'Error al consultar el Usuario, contacte con el soporte';
			require_once '../../Vistas/Proyecto/mensaje-vista.php';
		}
	}
 ?>