<?php
if (!empty($_POST))
	if (isset($_POST["nombre"])) {
		require_once '../../Modelos/investigaciones-modelos.php';
		$objUsuario = new Investigaciones();
		$objUsuario->setNombre($_POST['nombre']);
		$objUsuario->setTipoDeInvestigacion($_POST['tipo_de_investigacion']);
		$objUsuario->setFecha_Inicio($_POST['fecha_inicio']);
		$objUsuario->setFecha_Culminacion($_POST['fecha_culminacion']);
		$r1=$objUsuario->consultar();
		$mensaje = '';
		if ($r1['estatus']) { //verificamos si se ejecuto correctamente el metodo del modelo
			if (count($r1)<2) {  //contamos la cantidad de elemento en el arreglo
				$mensaje="El Proyecto no Existe en la base de Datos";
			}
			else{ //sino hay mas de 1 registro
				$r2 = $objUsuario->actualizar();
				if ($r2['estatus']) { ////verificamos si se ejecuto correctamente el metodo del modelo
					$mensaje = 'Actualización Exitosa';
				} else {//si hay un error al registrar
					$mensaje = 'Error al actualizar la Investigaciones, contacte con el soporte';
				}
			}
		}else{//si hay un error al consultar
			$mensaje = 'Error al actualizar la Investigacion, contacte con el soporte';
		}
		require_once '../../Vistas/mensaje-vista.php';
	}