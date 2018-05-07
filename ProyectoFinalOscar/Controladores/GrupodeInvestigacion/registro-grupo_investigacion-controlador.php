<?php
if (!empty($_POST))
	if (isset($_POST["nombre"])) {
		 require_once '../../Modelos/grupo-investigacion-modelo.php';

$usuario = new GrupoInv(); //definimos la instancia
$usuario->setNombre($_POST["nombre"]); 
$usuario->setFechaRegistro($_POST["fecha_registro"]);
$usuario->setArea_De_Trabajo($_POST["area_de_trabajo"]);
$usuario->setTipo_Unidad_Investigacion($_POST["tipo_unidad_investigacion"]);
$usuario->setUnidad_Trabajo($_POST["unidad_trabajo"]);
$usuario->setTutor($_POST["tutor"]);
$r1=$usuario->consultar();
		$mensaje = '';
		if ($r1['estatus']) { //verificamos si se ejecuto correctamente el metodo del modelo
			if (count($r1)>1) {  //contamos la cantidad de elemento en el arreglo
				$mensaje="El Grupo de Investigacion ya Existe en la base de Datos";
			}
			else{ //sino hay mas de 1 registro
				$r2 = $usuario->registrar();
				if ($r2['estatus']) { ////verificamos si se ejecuto correctamente el metodo del modelo
					$mensaje = 'Registro Exitoso';
				} else {//si hay un error al registrar
					$mensaje = 'Error al registrar el Grupo de Investigacion, contacte con el soporte';
				}
			}
		}else{//si hay un error al consultar
			$mensaje = 'Error al registrar el Grupo de Investigacion, contacte con el soporte';
		}
		require_once '../../Vistas/Grupo-Investigacion/mensaje-vista.php';
	}
?>