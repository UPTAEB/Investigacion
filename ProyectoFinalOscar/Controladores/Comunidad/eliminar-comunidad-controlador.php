<?php
if (!empty($_POST))
	if (isset($_POST["rif"])) {
		require_once '../../Modelos/comunidad-modelo.php';
		$objUsuario = new Comunidad();
		$objUsuario->setRif($_POST['rif']);
		$r1=$objUsuario->consultar();
		$mensaje = '';
		if ($r1['estatus']) { //verificamos si se ejecuto correctamente el metodo del modelo
			if (count($r1)<2) {  //contamos la cantidad de elemento en el arreglo
				$mensaje="El Usuario no Existe en la base de Datos";
			}
			else{ //sino hay mas de 1 registro
				$r2 = $objUsuario->eliminar();
				if ($r2['estatus']) { ////verificamos si se ejecuto correctamente el metodo del modelo
					$mensaje = 'Usuario Eliminado';
				} else {//si hay un error al registrar
					$mensaje = 'Error al Eliminar el Usuario, contacte con el soporte';
				}
			}
		}else{//si hay un error al consultar
			$mensaje = 'Error al Eliminar el Usuario, contacte con el soporte';
		}
		require_once '../../Vistas/mensaje-vista.php';
	}