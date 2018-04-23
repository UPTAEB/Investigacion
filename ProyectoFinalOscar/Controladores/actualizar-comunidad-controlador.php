<?php
if (!empty($_POST))
	if (isset($_POST["rif"])) {
		require_once '../Modelos/comunidad-modelo.php';
		$comunidad = new Comunidad();
		$comunidad->setRif($_POST['rif']);
		$comunidad->setNombre($_POST['nombre']);
		$comunidad->setEstado($_POST['estado']);
		$comunidad->setParroquia($_POST['parroquia']);
		$comunidad->setMunicipio($_POST['municipio']);
		$r1=$comunidad->consultar();
				$mensaje = '';
		if ($r1['estatus']) { //verificamos si se ejecuto correctamente el metodo del modelo
			if (count($r1)<2) {  //contamos la cantidad de elemento en el arreglo
				$mensaje="El Usuario no Existe en la base de Datos";
			}
			else{ //sino hay mas de 1 registro
				$r2 = $comunidad->actualizar();
				if ($r2['estatus']) { ////verificamos si se ejecuto correctamente el metodo del modelo

					$mensaje = 'Actualización Exitosa';
				} else {//si hay un error al registrar
					$mensaje = 'Error al actualizar la Comunidad, contacte con el soporte';
				}
			}
		}else{//si hay un error al consultar
			$mensaje = 'Error al actualizar el Usuario, contacte con el soporte';
		}
		require_once '../Vistas/mensaje-vista.php';
	}
