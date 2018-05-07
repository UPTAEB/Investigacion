<?php
if (!empty($_POST))
	if (isset($_POST["nombre"])) {
		 require_once '../../Modelos/investigaciones-modelos.php';
$nombre=$_POST["nombre"];
$tipo_de_investigacion=$_POST["tipo_de_investigacion"];
$fecha_inicio=$_POST["fecha_inicio"];
$fecha_culminacion=$_POST["fecha_culminacion"];
$id_grupo=$_POST["id_grupo"];
if ($nombre==NULL||$tipo_de_investigacion==NULL||$fecha_inicio==NULL||$fecha_culminacion==NULL||$id_grupo==0) {
	$mensaje ="Error- Debe llenar todos los Campos para el Registro";
	require_once '../../Vistas/Investigaciones/mensaje-vista.php';
}
else{
$investigacion = new Investigaciones(); //definimos la instancia
$investigacion->setNombre($_POST["nombre"]);
$investigacion->setTipoDeInvestigacion($_POST["tipo_de_investigacion"]);
$investigacion->setFecha_Inicio($_POST["fecha_inicio"]);
$investigacion->setFecha_Culminacion($_POST["fecha_culminacion"]);
$investigacion->setId_Grupo($_POST["id_grupo"]);
$r1=$investigacion->consultar();
		$mensaje = '';
		if ($r1['estatus']) { //verificamos si se ejecuto correctamente el metodo del modelo
			if (count($r1)>1) {  //contamos la cantidad de elemento en el arreglo
				$mensaje="La Investigacion ya Existe en la base de Datos";
			}
			else{ //sino hay mas de 1 registro
				$r2 = $investigacion->registrar();
				if ($r2['estatus']) { ////verificamos si se ejecuto correctamente el metodo del modelo
					$mensaje = 'Registro Exitoso';
				} else
				{//si hay un error al registrar
					$mensaje = 'Error al registrar la Investigacion, contacte con el soporte';
				}
			}
		}else{//si hay un error al consultar
			$mensaje = 'Error al registrar La Investigacion, contacte con el soporte';
		}
		require_once '../../Controladores/MacroProyecto/index-macroproyecto-controlador.php';
	}
}
?>