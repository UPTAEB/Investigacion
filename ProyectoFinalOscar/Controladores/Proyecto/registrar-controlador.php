<?php
if (!empty($_POST))
	if (isset($_POST["titulo"])) {
		 require_once '../../Modelos/proyecto-modelo.php';

$usuario = new Proyecto(); //definimos la instancia
$usuario->setTitulo($_POST["titulo"]);
$usuario->setObjetivo_General($_POST["objetivo_general"]);
$usuario->setObjetivo_Especifico($_POST["objetivo_especifico"]);
$usuario->setResumen($_POST["resumen"]);
$usuario->setId_Comunidad($_POST["id_comunidad"]);
$usuario->setId_Macroproyecto($_POST["id_macroproyecto"]);
$usuario->setId_Grupo($_POST["id_grupo"]);
$usuario->setEstado($_POST["estado"]);
$r1=$usuario->consultar();
		$mensaje = '';
		if ($r1['estatus']) { //verificamos si se ejecuto correctamente el metodo del modelo
			if (count($r1)>1) {  //contamos la cantidad de elemento en el arreglo
				$mensaje="El Proyecto ya Existe en la base de Datos";
			}
			else{ //sino hay mas de 1 registro
				$r2 = $usuario->registrar();
				if ($r2['estatus']) { ////verificamos si se ejecuto correctamente el metodo del modelo
					$mensaje = 'Registro Exitoso';
				} else {//si hay un error al registrar
					$mensaje = 'Error al registrar el Proyecto, contacte con el soporte';
				}
			}
		}else{//si hay un error al consultar
			$mensaje = 'Error al registrar el Proyecto, contacte con el soporte';
		}
		require_once '../../Vistas/Proyecto/mensaje-vista.php';
	}


//print_r($usuario->registrar()); //ejecutamos el registrar e imprimimos. NOTA: recuerden que deben imprimir en la vista, para la simplicidad de esta practica se esta realizando aca.

//comandos para comprobar la conexion activa en la base de datos
//SELECT * FROM pg_stat_activity;
//SELECT sum(numbackends) FROM pg_stat_database;
//sleep(4); //delay, tiempo de espera de ejecucion por 10 segundos
//$usuario->__destruct(); // ejecutamos el destructor

?>