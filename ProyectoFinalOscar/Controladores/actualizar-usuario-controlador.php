<?php
if (!empty($_POST))
	if (isset($_POST["cedula"])) {
		require_once '../Modelos/usuario-modelo.php';
		$objUsuario = new Usuario();
		$objUsuario->setCedula($_POST['cedula']);
		$objUsuario->setNombre($_POST['nombre']);
		$objUsuario->setApellido($_POST['apellido']);
		$objUsuario->setCorreo($_POST['correo']);
		$objUsuario->setDireccion($_POST['direccion']);
		$objUsuario->setTelefono($_POST['telefono']);
		$objUsuario->setRol($_POST['rol']);
		$objUsuario->setSexo($_POST['sexo']);
		$objUsuario->setClave($_POST['clave']);
		$r1=$objUsuario->consultar();
		print_r($r1);
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
