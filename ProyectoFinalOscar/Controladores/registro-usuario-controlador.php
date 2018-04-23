<?php
if (!empty($_POST))
	if (isset($_POST["cedula"])) {
		 require_once '../Modelos/usuario-modelo.php';

$usuario = new Usuario(); //definimos la instancia
$usuario->setNombre($_POST["nombre"]); 
$usuario->setDireccion($_POST["direccion"]);
$usuario->setSexo($_POST["sexo"]);
$usuario->setRol($_POST["rol"]);
$usuario->setClave($_POST["clave"]);
$usuario->setApellido($_POST["apellido"]);
$usuario->setCedula($_POST["cedula"]);
$usuario->setTelefono($_POST["telefono"]);
$usuario->setCorreo($_POST["correo"]);
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
		require_once '../Vistas/mensaje-vista.php';
	}


//print_r($usuario->registrar()); //ejecutamos el registrar e imprimimos. NOTA: recuerden que deben imprimir en la vista, para la simplicidad de esta practica se esta realizando aca.

//comandos para comprobar la conexion activa en la base de datos
//SELECT * FROM pg_stat_activity;
//SELECT sum(numbackends) FROM pg_stat_database;
//sleep(4); //delay, tiempo de espera de ejecucion por 10 segundos
//$usuario->__destruct(); // ejecutamos el destructor

?>