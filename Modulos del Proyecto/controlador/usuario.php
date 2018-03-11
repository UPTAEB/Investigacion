<?php 
/**
* controlador de usuarios
*/

require_once "modelo/usuario.php";

class Controlador_Usuario{
	
	private $obj_usuario;

	public function __construct()
	{
		$this->obj_usuario = new Modelo_usuario();
	}
	
	public function registrar_usuario(){

			$this->obj_usuario->set_nombre($_POST['nombre']);
			$this->obj_usuario->set_apellido($_POST['apellido']);
			$this->obj_usuario->set_cedula($_POST['cedula']);
			$this->obj_usuario->set_correo($_POST['correo']);
			$this->obj_usuario->set_telefono($_POST['telefono']);
			$this->obj_usuario->set_sexo($_POST['sexo']);
			$this->obj_usuario->set_direccion($_POST['direccion']);
			$this->obj_usuario->set_clave(md5($_POST['clave']));
			$this->obj_usuario->set_rol($_POST['rol']);

			$resultados = $this->obj_usuario->insertar();

			if (!$resultados) {

				echo "Hubo un problema y no pudo insertarse..";

			}else{

				header("location: ?controller=front&action=usuarios&id_action=3");
			}
	}
	
	public function modificar_usuario(){
            $this->obj_usuario->set_id_usuario($_POST['id_usuario']);
			$this->obj_usuario->set_nombre($_POST['nombre']);
			$this->obj_usuario->set_apellido($_POST['apellido']);
			$this->obj_usuario->set_cedula($_POST['cedula']);
			$this->obj_usuario->set_correo($_POST['correo']);
			$this->obj_usuario->set_telefono($_POST['telefono']);
			$this->obj_usuario->set_sexo($_POST['sexo']);
			$this->obj_usuario->set_direccion($_POST['direccion']);
			$this->obj_usuario->set_clave(md5($_POST['clave']));
			$this->obj_usuario->set_rol($_POST['rol']);

			$resultados = $this->obj_usuario->actualizar();

			if (!$resultados) {

				echo "Hubo un problema y no pudo modificarse..";

			}else{

				header("location: ?controller=front&action=usuarios&id_action=5");
			}
	}

	public function eliminar_usuario(){
            $this->obj_usuario->set_id_usuario($_POST['id_usuario']);
			$resultados = $this->obj_usuario->eliminar();

			if (!$resultados) {

				echo "Hubo un problema y no pudo eliminarse..";

			}else{

				header("location: ?controller=front&action=usuarios&id_action=6");
			}
	}
	
	
	
   public function sesion(){
		$titulo_de_la_vista = "Inicio de Sesión";
		require_once "vista/login.php";
	}
	
	public function login(){

		$this->obj_usuario->set_nombre($_POST['nombre']);
		$this->obj_usuario->set_clave(md5($_POST['clave']));
		$datos_usuario = $this->obj_usuario->validar_usuario();

		if (!$datos_usuario) {
			
			header("location: ?action=sesion&id_m=1");
				
		}else{

					session_start();
					$_SESSION['id']     = $datos_usuario->id_usuario;
					$_SESSION['nombre']   = $datos_usuario->nombre;
					$_SESSION['id_rol']   = $datos_usuario->rol;

					header("location: ?controller=front&action=perfil&id_action=1");
				}
				
	}
	

	public function cerrar_sesion(){

		session_start();
		session_destroy();
		header("location: ?action=sesion&id_m=3");
	}
}
?>