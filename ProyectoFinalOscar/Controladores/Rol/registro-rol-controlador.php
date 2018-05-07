<?php
if (!empty($_POST))
	if (isset($_POST["nombre_rol"])) {
		 require_once '../../Modelos/rol-modelo.php';

$usuario = new Rol(); //definimos la instancia
$usuario->setNombre_Rol($_POST["nombre_rol"]); 
$usuario->setCodigo_Rol($_POST["codigo_rol"]);
$r1=$usuario->consultar();
		$mensaje = '';
		if ($r1['estatus']) { //verificamos si se ejecuto correctamente el metodo del modelo
			if (count($r1)>1) {  //contamos la cantidad de elemento en el arreglo
				$mensaje="El Usuario ya Existe en la base de Datos";
			}
			else{ //sino hay mas de 1 registro
				$r2 = $usuario->registrar();
				if ($r2['estatus']) { ////verificamos si se ejecuto correctamente el metodo del modelo
					$mensaje = 'Registro Exitoso';
				} else {//si hay un error al registrar
					$mensaje = 'Error al registrar el Usuario, contacte con el soporte';
				}
			}
		}else{//si hay un error al consultar
			$mensaje = 'Error al registrar el Usuario, contacte con el soporte';
		}
		require_once '../../Vistas/mensaje-vista.php';
	}
?>