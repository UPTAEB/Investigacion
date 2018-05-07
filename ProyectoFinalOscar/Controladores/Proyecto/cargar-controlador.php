<?php

if (!empty($_POST))
	if (isset($_POST["titulo"])) {
		require_once '../../Modelos/proyecto-modelo.php';
		$objUsuario = new Proyecto();
		$objUsuario->setTitulo($_POST['titulo']);
		$r1=$objUsuario->consultar();
		$mensaje = '';
		if ($r1['estatus']) { //verificamos si se ejecuto correctamente el metodo del modelo
			require_once '../../Vistas/Proyecto/actualizar-vista.php';
		}else{//si hay un error al consultar
			$mensaje = 'Error al consultar el Usuario, contacte con el soporte';
			require_once '../Vistas/mensaje-vista.php';
		}
	}
?>
