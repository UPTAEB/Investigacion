<?php
require_once '../../Modelos/macroproyecto-modelo.php';
$proyecto=new Macroproyecto();
$idMacroproyecto=$proyecto->getLastId();
if (!empty($_POST))
	if (isset($_POST["titulo"])) {
if($_POST["titulo"] ==null || $_POST["objetivo_especifico"]==null || $_POST["objetivo_general"]== null || $_POST["id_comunidad"] ==0 || $_POST["id_linea_investigacion"]==0 ){
	require_once '../../Vistas/Proyecto/mensaje-vista.php';
	
}
		 require_once '../../Modelos/proyecto-modelo.php';

$proyecto = new Proyecto(); //definimos la instancia
$proyecto->setTitulo($_POST["titulo"]);
$proyecto->setObjetivo_General($_POST["objetivo_general"]);
$proyecto->setObjetivo_Especifico($_POST["objetivo_especifico"]);
$proyecto->setId_Macroproyecto($idMacroproyecto);
$proyecto->setId_linea_investigacion($_POST["id_linea_investigacion"]);
$proyecto->setId_Comunidad($_POST["id_comunidad"]);
$r1=$proyecto->consultar();
		$mensaje = '';
		if ($r1['estatus']) { //verificamos si se ejecuto correctamente el metodo del modelo
			if (count($r1)>1) {  //contamos la cantidad de elemento en el arreglo
				$mensaje="El Proyecto ya Existe en la base de Datos";
				$msj = 'Proyecto Registrado';
			}
			else{ //sino hay mas de 1 registro
				$r2 = $proyecto->registrar();
				if ($r2['estatus']) { ////verificamos si se ejecuto correctamente el metodo del modelo
					$mensaje = 'Proyecto Registrado';
					$msj = 'Proyecto Registrado';
				} else {//si hay un error al registrar
					$mensaje = 'Error al registrar el Proyecto, contacte con el soporte';
				}
			}
		}else{//si hay un error al consultar
			$mensaje = 'Error al registrar el Proyectoo, contacte con el soporte';
		}
		require_once '../../Vistas/Proyecto/mensaje-exito.php';
	}

?>