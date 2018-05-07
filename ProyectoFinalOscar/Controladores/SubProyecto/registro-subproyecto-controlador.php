<?php
require_once '../../Modelos/proyecto-modelo.php';
$proyecto = new Proyecto();
$idProyecto = $proyecto->getLastId();
if (!empty($_POST))
	if (isset($_POST["descripcion"])) {
		 require_once '../../Modelos/subproyecto-modelo.php';
if($_POST["titulo"] ==null || $_POST["descripcion"]==null ){
	require_once '../Vistas/SubProyecto/mensaje-vista.php';
	return;
$subproyecto = new SubProyecto(); //definimos la instancia
$subproyecto->setTitulo($_POST["titulo"]);
$subproyecto->setDescripcion($_POST["descripcion"]);
$subproyecto->setId_Proyecto($idProyecto);
$r1=$subproyecto->consultar();
		$mensaje = '';
		if ($r1['estatus']) { //verificamos si se ejecuto correctamente el metodo del modelo
			if (count($r1)>1) {  //contamos la cantidad de elemento en el arreglo
				$mensaje="El Usuario ya Existe en la base de Datos";
			}
			else{ //sino hay mas de 1 registro
				$r2 = $subproyecto->registrar();
				if ($r2['estatus']) { ////verificamos si se ejecuto correctamente el metodo del modelo
					$mensaje = 'Registro Exitoso';
				} else {//si hay un error al registrar
					$mensaje = 'Error al registrar el Usuario, contacte con el soporte';
				}
			}
		}else{//si hay un error al consultar
			$mensaje = 'Error al registrar el Usuario, contacte con el soporte';
		}
		require_once '../../Vistas/Proyecto/mensaje-vista.php';
	}
}
?>