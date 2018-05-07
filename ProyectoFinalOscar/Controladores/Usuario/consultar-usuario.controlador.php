<?php
		require_once '../../Modelos/usuario-modelo.php';
		$objUsuario = new Usuario();
		$r1=$objUsuario->consultarNombreUsuario();
		$mensaje = '';
		if ($r1['estatus'])
		 { //verificamos si se ejecuto correctamente el metodo del modelo
			require_once '../../Vistas/Usuario/cargar-usuario-vista.php';

		}else{
		print_r($r1);//si hay un error al consultar
			$mensaje = 'Error al consultar el Usuario, contacte con el soporte';
			require_once '../Vistas/mensaje-vista.php';
		}
?>