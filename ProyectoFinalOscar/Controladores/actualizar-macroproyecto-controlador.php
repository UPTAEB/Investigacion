<?php
if (!empty($_POST))
	if (isset($_POST["nombre"])) {
		require_once '../Modelos/macroproyecto-modelo.php';
		$objUsuario = new Macroproyecto();
		$objUsuario->setNombre($_POST['nombre']);
		$objUsuario->setObjetivo_estrategico($_POST['objetivo_estrategico']);
		$objUsuario->setCoordinador($_POST["coordinador"]);
		$objUsuario->setEstatus($_POST['estatus']);
		$r1=$objUsuario->consultar();
		$mensaje = '';
		if ($r1['estatus']) { //verificamos si se ejecuto correctamente el metodo del modelo
			if (count($r1)<2) {  //contamos la cantidad de elemento en el arreglo
				$mensaje="El Usuario no Existe en la base de Datos";
			}
			else{ //sino hay mas de 1 registro
				$r2 = $objUsuario->actualizar();
				if ($r2['estatus']) { ////verificamos si se ejecuto correctamente el metodo del modelo
					$mensaje = 'Actualización Exitosa';
				} else {//si hay un error al registrar
					$mensaje = 'Error al actualizar el Usuario, contacte con el soporte';
				}
			}
		}else{//si hay un error al consultar
			$mensaje = 'Error al actualizar el Usuario, contacte con el soporte';
		}
		require_once '../Vistas/mensaje-vista.php';
	}
?>