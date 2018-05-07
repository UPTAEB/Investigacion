<?php
if (!empty($_POST))
	if (isset($_POST["nombre"])) {
		 require_once '../../Modelos/programa-modelo.php';

$usuario = new Programa(); //definimos la instancia
$usuario->setNombre($_POST["nombre"]); 
$usuario->setDescripcion($_POST["descripcion"]);
$usuario->setSiglas($_POST["siglas"]);
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
		require_once '../../Vistas/Programa/mensaje-vista.php';
	}
?>