<?php
if (!empty($_POST))
	if (isset($_POST["nombre"])) {
		 require_once '../../Modelos/linea_investigacion-modelo.php';
$nombre=$_POST["nombre"];
$descripcion=$_POST["descripcion"];
$id_programa=$_POST["id_programa"];
if ($nombre==NULL||$descripcion==NULL||$id_programa==0) {
	$mensaje ="Error- Debe llenar todos los Campos para el Registro";
	require_once '../../Vistas/Linea-Investigacion/mensaje-vista.php';
}
else{
$lineainv = new LineaInv(); //definimos la instancia
$lineainv->setNombre($_POST["nombre"]); 
$lineainv->setDescripcion($_POST["descripcion"]);
$lineainv->setIdPrograma($_POST["id_programa"]);
$r1=$lineainv->consultar();
		$mensaje = '';
		if ($r1['estatus']) { //verificamos si se ejecuto correctamente el metodo del modelo
			if (count($r1)>1) {  //contamos la cantidad de elemento en el arreglo
				$mensaje="El Usuario ya Existe en la base de Datos";
			}
			else{ //sino hay mas de 1 registro
				$r2 = $lineainv->registrar();
				if ($r2['estatus']) { ////verificamos si se ejecuto correctamente el metodo del modelo
					$mensaje = 'Registro Exitoso';
				} else {//si hay un error al registrar
					$mensaje = 'Error al registrar la linea de investigacion, contacte con el soporte';
				}
			}
		}else{//si hay un error al consultar
			$mensaje = 'Error al registrar el Usuario, contacte con el soporte';
		}
		require_once '../../Vistas/Linea-Investigacion/mensaje-vista.php';
	}
    }
?>