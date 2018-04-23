<?php
if (!empty($_POST))
	if (isset($_POST["titulo"])) {
		require_once '../../Modelos/proyecto-modelo.php';
		$objUsuario = new Proyecto();
		$objUsuario->setTitulo($_POST['titulo']);
		$objUsuario->setObjetivo_General($_POST['objetivo_general']);
		$objUsuario->setObjetivo_Especifico($_POST['objetivo_especifico']);
		$objUsuario->setResumen($_POST['resumen']);
		$objUsuario->setEstado($_POST['estado']);
		
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
					$mensaje = 'Error al actualizar el Usuario, contacte con el soporte';
				}
			}
		}else{//si hay un error al consultar
			$mensaje = 'Error al actualizar el Usuario, contacte con el soporte';
		}
		require_once '../../Vistas/mensaje-vista.php';
	}
