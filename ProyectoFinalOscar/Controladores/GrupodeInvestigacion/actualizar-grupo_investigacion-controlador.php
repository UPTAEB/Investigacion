<?php
if (!empty($_POST))
	if (isset($_POST["nombre"])) {
		require_once '../../Modelos/grupo-investigacion-modelo.php';
		$objUsuario = new GrupoInv();
		$objUsuario->setNombre($_POST['nombre']);
		$objUsuario->setTutor($_POST['tutor']);
		$objUsuario->setUnidad_Trabajo($_POST['unidad_trabajo']);
		$objUsuario->setTipo_Unidad_Investigacion($_POST['tipo_unidad_investigacion']);
		$objUsuario->setArea_De_Trabajo($_POST['area_de_trabajo']);
		$objUsuario->setFechaRegistro($_POST['fecha_registro']);
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
		require_once '../../Vistas/mensaje-vista.php';
	}
