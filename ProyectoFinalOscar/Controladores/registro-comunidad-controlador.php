<?php
if (!empty($_POST))
	if (isset($_POST["rif"])) {
		 require_once '../Modelos/comunidad-modelo.php';

$comunidad = new Comunidad(); //definimos la instancia
$comunidad->setNombre($_POST["nombre"]); 
$comunidad->setRif($_POST["rif"]);
$comunidad->setMunicipio($_POST["municipio"]);
$comunidad->setEstado($_POST["estado"]);
$comunidad->setParroquia($_POST["parroquia"]);

$r1=$comunidad->consultar();
		$mensaje = '';
		if ($r1['estatus']) { //verificamos si se ejecuto correctamente el metodo del modelo
			if (count($r1)>1) {  //contamos la cantidad de elemento en el arreglo
				$mensaje="El Usuario ya Existe en la base de Datos";
			}
			else{ //sino hay mas de 1 registro
				$r2 = $comunidad->registrar();
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