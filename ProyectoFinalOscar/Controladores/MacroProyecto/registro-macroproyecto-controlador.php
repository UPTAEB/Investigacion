<?php
require_once '../../Modelos/investigaciones-modelos.php';
$investigacion=new Investigaciones();
$idInvestigacion=$investigacion->getLastId();
if (!empty($_POST))
	if (isset($_POST["nombre"])) {
		 require_once '../../Modelos/macroproyecto-modelo.php';
if($_POST["nombre"] ==null || $_POST["objetivo_estrategico"]==null || $_POST["coordinador"]== null || $_POST["estatus"] =="Seleccione"  ){
	require_once '../../Vistas/MacroProyecto/mensaje-error-vista.php';
	return;
}
$macroproyecto = new Macroproyecto();
$macroproyecto->setNombre($_POST["nombre"]); 
$macroproyecto->setObjetivo_estrategico($_POST["objetivo_estrategico"]);
$macroproyecto->setCoordinador($_POST["coordinador"]);
$macroproyecto->setEstatus($_POST["estatus"]); 
$macroproyecto->setId_Investigacion($idInvestigacion);

$r1=$macroproyecto->consultar();
		print_r($r1);
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
		//require_once '../../Vistas/mensaje-vista.php';
		require_once '../Proyecto/index-proyecto-controlador.php';
	}
?>