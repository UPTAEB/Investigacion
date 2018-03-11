<?php 
/**
* controlador de rol
*/

require_once "modelo/rol.php";

class Controlador_rol{
	
	private $obj_rol;

	public function __construct()
	{
		$this->obj_rol = new Modelo_rol();
	}
	
	public function registrar_rol(){
			$this->obj_rol->set_nombre_rol($_POST['nombre_rol']);
			$this->obj_rol->set_codigo_rol($_POST['codigo_rol']);

			$resultados = $this->obj_rol->insertar();

			if (!$resultados) {

				echo "Hubo un problema y no pudo insertarse..";

			}else{

				header("location: ?controller=front&action=roles&id_action=3");
			}
	}
	
	public function modificar_rol(){
            $this->obj_rol->set_id($_POST['id']);
			$this->obj_rol->set_nombre_rol($_POST['nombre_rol']);
			$this->obj_rol->set_codigo_rol($_POST['codigo_rol']);

			$resultados = $this->obj_rol->actualizar();

			if (!$resultados) {

				echo "Hubo un problema y no pudo modificarse..";

			}else{

				header("location: ?controller=front&action=roles&id_action=5");
			}
	}

	public function eliminar_rol(){
            $this->obj_rol->set_id($_POST['id']);
			$resultados = $this->obj_rol->eliminar();

			if (!$resultados) {

				echo "Hubo un problema y no pudo eliminarse..";

			}else{

				header("location: ?controller=front&action=roles&id_action=6");
			}
	}
	
	
	
}
?>