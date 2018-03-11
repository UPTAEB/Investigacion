<?php 

require_once "modelo/grupo_de_investigacion.php";

class Controlador_grupo_de_investigacion{
	
	private $obj_grupo_de_investigacion;

	public function __construct()
	{
		$this->obj_grupo_de_investigacion = new Modelo_grupo_de_investigacion();
	}
	
	public function registrar_grupo_de_investigacion(){
			$this->obj_grupo_de_investigacion->set_fecha_registro($_POST['fecha_registro']);
			$this->obj_grupo_de_investigacion->set_area_de_trabajo($_POST['area_de_trabajo']);
			$this->obj_grupo_de_investigacion->set_tipo_unidad_investigacion($_POST['tipo_unidad_investigacion']);
			$this->obj_grupo_de_investigacion->set_responsable_del_grupo($_POST['responsable_del_grupo']);
			$this->obj_grupo_de_investigacion->set_nombre($_POST['nombre']);
			$this->obj_grupo_de_investigacion->set_unidad_investigacion($_POST['unidad_investigacion']);

			$resultados = $this->obj_grupo_de_investigacion->insertar();

			if (!$resultados) {

				echo "Hubo un problema y no pudo insertarse..";

			}else{

				header("location: ?controller=front&action=grupo_de_investigacion&id_action=3&id_o=3");
			}
	}
	
	public function modificar_grupo_de_investigacion(){
            $this->obj_grupo_de_investigacion->set_id_grupo($_POST['id_grupo']);
			$this->obj_grupo_de_investigacion->set_area_de_trabajo($_POST['area_de_trabajo']);
			$this->obj_grupo_de_investigacion->set_tipo_unidad_investigacion($_POST['tipo_unidad_investigacion']);
			$this->obj_grupo_de_investigacion->set_responsable_del_grupo($_POST['responsable_del_grupo']);
			$this->obj_grupo_de_investigacion->set_nombre($_POST['nombre']);
			$this->obj_grupo_de_investigacion->set_unidad_investigacion($_POST['unidad_investigacion']);

			$resultados = $this->obj_grupo_de_investigacion->actualizar();

			if (!$resultados) {

				echo "Hubo un problema y no pudo modificarse..";

			}else{

				header("location: ?controller=front&action=grupo_de_investigacion&id_action=5&id_o=3");
			}
	}

	public function eliminar_grupo_de_investigacion(){
            $this->obj_grupo_de_investigacion->set_id_grupo($_POST['id_grupo']);
			$resultados = $this->obj_grupo_de_investigacion->eliminar();

			if (!$resultados) {

				echo "Hubo un problema y no pudo eliminarse..";

			}else{

				header("location: ?controller=front&action=grupo_de_investigacion&id_action=6&id_o=3");
			}
	}
	
	
	
}
?>