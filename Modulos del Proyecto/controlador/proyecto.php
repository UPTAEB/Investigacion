<?php 
/**
* controlador de proyecto
*/

require_once "modelo/proyectos.php";

class Controlador_proyecto{
	
	private $obj_proyecto;

	public function __construct()
	{
		$this->obj_Proyecto = new Modelo_Proyecto();
	}
	
	public function registrar_Proyectos(){
			$this->obj_Proyecto->set_id_comunidad($_POST['id_comunidad']);
			$this->obj_Proyecto->set_id_macroproyecto($_POST['id_macroproyecto']);
			$this->obj_Proyecto->set_id_grupo($_POST['id_grupo']);
			$this->obj_Proyecto->set_titulo($_POST['titulo']);
			$this->obj_Proyecto->set_objetivo_general($_POST['objetivo_general']);
			$this->obj_Proyecto->set_objetivo_especifico($_POST['objetivo_especifico']);
			$this->obj_Proyecto->set_resumen($_POST['resumen']);

			$resultados = $this->obj_Proyecto->insertar();

			if (!$resultados) {

				echo "Hubo un problema y no pudo insertarse..";

			}else{

				header("location: ?controller=front&action=perfil&id_action=3");
			}
	}
	
	public function modificar_proyecto(){
	        $this->obj_Proyecto->set_id($_POST['id']);
			$this->obj_Proyecto->set_id_comunidad($_POST['id_comunidad']);
			$this->obj_Proyecto->set_id_macroproyecto($_POST['id_macroproyecto']);
			$this->obj_Proyecto->set_id_grupo($_POST['id_grupo']);
			$this->obj_Proyecto->set_titulo($_POST['titulo']);
			$this->obj_Proyecto->set_objetivo_general($_POST['objetivo_general']);
			$this->obj_Proyecto->set_objetivo_especifico($_POST['objetivo_especifico']);
			$this->obj_Proyecto->set_resumen($_POST['resumen']);

			$resultados = $this->obj_Proyecto->actualizar();

			if (!$resultados) {

				echo "Hubo un problema y no pudo modificarse..";

			}else{

				header("location: ?controller=front&action=perfil&id_action=5");
			}
	}

	public function eliminar_proyecto(){
            $this->obj_Proyecto->set_id($_POST['id']);
			$resultados = $this->obj_Proyecto->eliminar();

			if (!$resultados) {

				echo "Hubo un problema y no pudo eliminarse..";

			}else{

				header("location: ?controller=front&action=perfil&id_action=6");
			}
	}
	
	
	
}
?>