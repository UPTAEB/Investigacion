<?php 
/**
* controlador de proyecto
*/

require_once "modelo/comunidad.php";

class Controlador_comunidad{
	
	private $obj_comunidad;

	public function __construct()
	{
		$this->obj_comunidad = new Modelo_comunidad();
	}
	
	public function registrar_comunidad(){
			$this->obj_comunidad->set_nombre($_POST['nombre']);
			$this->obj_comunidad->set_rif($_POST['rif']);
			$this->obj_comunidad->set_estado($_POST['estado']);
			$this->obj_comunidad->set_parroquia($_POST['parroquia']);
			$this->obj_comunidad->set_municipio($_POST['municipio']);

			$resultados = $this->obj_comunidad->insertar();

			if (!$resultados) {

				echo "Hubo un problema y no pudo insertarse..";

			}else{

				header("location: ?controller=front&action=comunidad&id_action=3");
			}
	}
	
	public function modificar_comunidad(){
            $this->obj_comunidad->set_id_comunidad($_POST['id_comunidad']);
			$this->obj_comunidad->set_nombre($_POST['nombre']);
			$this->obj_comunidad->set_rif($_POST['rif']);
			$this->obj_comunidad->set_estado($_POST['estado']);
			$this->obj_comunidad->set_parroquia($_POST['parroquia']);
			$this->obj_comunidad->set_municipio($_POST['municipio']);

			$resultados = $this->obj_comunidad->actualizar();

			if (!$resultados) {

				echo "Hubo un problema y no pudo modificarse..";

			}else{

				header("location: ?controller=front&action=comunidad&id_action=5");
			}
	}

	public function eliminar_comunidad(){
            $this->obj_comunidad->set_id_comunidad($_POST['id_comunidad']);
			$resultados = $this->obj_comunidad->eliminar();

			if (!$resultados) {

				echo "Hubo un problema y no pudo eliminarse..";

			}else{

				header("location: ?controller=front&action=comunidad&id_action=6");
			}
	}
	
	
	
}
?>