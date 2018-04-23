<?php
if (!empty($_POST))
	if (isset($_POST["nombre"])) {
		 require_once '../Modelos/macroproyecto-modelo.php';

$macroproyecto = new Macroproyecto();
$macroproyecto->setNombre($_POST["nombre"]); 
$macroproyecto->setObjetivo_estrategico($_POST["objetivo_estrategico"]);
$macroproyecto->setCoordinador($_POST["coordinador"]);
$macroproyecto->setEstatus($_POST["estatus"]); 

$r1=$macroproyecto->consultar();
		$mensaje = '';
		if ($r1['estatus']) { //verificamos si se ejecuto correctamente el metodo del modelo
			if (count($r1)>1) {  //contamos la cantidad de elemento en el arreglo
				$mensaje="El Usuario ya Existe en la base de Datos";
			}
			else{ //sino hay mas de 1 registro
				$r2 = $macroproyecto->registrar();
				if ($r2['estatus']) { ////verificamos si se ejecuto correctamente el metodo del modelo
					$mensaje = 'Registro Exitoso';
				} else {//si hay un error al registrar
					$mensaje = 'Error al registrar el Usuario, contacte con el soporte';
				}
			}
		}else{//si hay un error al consultar
			$mensaje = 'Error al registrar el Usuario, contacte con el soporte';
		}
		require_once '../Vistas/mensaje-vista.php';
	}
?>