<?php
if (!empty($_POST))
	if (isset($_POST["id_usuario"])) {
		 require_once '../../Modelos/usuario-grupo-modelo.php';
$id_usuario=$_POST["id_usuario"];
$id_grupo=$_POST["id_grupo"];
$fecha_afiliacion=$_POST["fecha_afiliacion"];
if ($id_usuario==0||$id_grupo==0||$fecha_afiliacion==NULL) {
	$mensaje ="Error- Debe llenar todos los Campos para el Registro";
	$msj="Intente de Nuevo";
	require_once '../../Vistas/Usuario-Grupo/mensaje-vista.php';
}
else{
$lineainv = new UsuarioGrupo(); //definimos la instancia
$lineainv->setIdUsuario($_POST["id_usuario"]); 
$lineainv->setIdGrupo($_POST["id_grupo"]);
$lineainv->setFechaAfiliacion($_POST["fecha_afiliacion"]);
$r1=$lineainv->consultar();
		$mensaje = '';
		if ($r1['estatus']) { //verificamos si se ejecuto correctamente el metodo del modelo
			if (count($r1)>1) {  //contamos la cantidad de elemento en el arreglo
				$mensaje="El Usuario ya esta Afiliado al Grupo";
				$msj="Afiliar Otro Usuario";
			}
			else{ //sino hay mas de 1 registro
				$r2 = $lineainv->registrar();
				if ($r2['estatus']) { ////verificamos si se ejecuto correctamente el metodo del modelo
					$mensaje = 'Registro Exitoso';
					$msj="Afiliar Otro Usuario";
				} else {//si hay un error al registrar
					$mensaje = 'Error al Afiliar Usuario, contacte con el soporte';
					$msj="Intente de Nuevo";
				}
			}
		}else{//si hay un error al consultar
			$mensaje = 'Error al Afiliar el Usuario, contacte con el soporte';
			$msj="Intente de Nuevo";
		}
		require_once '../../Vistas/Usuario-Grupo/mensaje-vista.php';
	}
    }
?>