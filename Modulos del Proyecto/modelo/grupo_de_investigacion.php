<?php 
/**
MODELO DE grupo_de_investigacion:

METODOS:


**/
require_once "database/conexion.php";
class Modelo_grupo_de_investigacion{

	private $pdo;
	private $id_grupo;
	private $fecha_registro;
	private $area_de_trabajo;
	private $grupo_de_investigacion;
	private $responsable_del_grupo;
	private $unidad_investigacion;
	private $nombre;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function set_id_grupo($id_grupo){$this->id_grupo = $id_grupo;}
	public function get_id_grupo(){return $this->id_grupo;}

	public function set_fecha_registro($fecha_registro){$this->fecha_registro = $fecha_registro;}
	public function get_fecha_registro(){return $this->fecha_registro;}
	
	public function set_area_de_trabajo($area_de_trabajo){$this->area_de_trabajo = $area_de_trabajo;}
	public function get_area_de_trabajo(){return $this->area_de_trabajo;}

	public function set_tipo_unidad_investigacion($tipo_unidad_investigacion){$this->tipo_unidad_investigacion = $tipo_unidad_investigacion;}
	public function get_tipo_unidad_investigacion(){return $this->tipo_unidad_investigacion;}
	
	public function set_responsable_del_grupo($responsable_del_grupo){$this->responsable_del_grupo = $responsable_del_grupo;}
	public function get_responsable_del_grupo(){return $this->responsable_del_grupo;}
	
	public function set_nombre($nombre){$this->nombre = $nombre;}
	public function get_nombre(){return $this->nombre;}
	
	public function set_unidad_investigacion($unidad_investigacion){$this->unidad_investigacion = $unidad_investigacion;}
	public function get_unidad_investigacion(){return $this->unidad_investigacion;}
	
	public function insertar(){

		try
			{	
				$sql = $this->pdo->prepare("INSERT INTO grupo_de_investigacion(fecha_registro, area_de_trabajo, tipo_unidad_investigacion, responsable_del_grupo, nombre, unidad_investigacion) VALUES ('$this->fecha_registro','$this->area_de_trabajo','$this->tipo_unidad_investigacion','$this->responsable_del_grupo','$this->nombre','$this->unidad_investigacion')");
				$result = $sql->execute();
				return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function actualizar(){

		try
			{	
				$sql = $this->pdo->prepare("UPDATE grupo_de_investigacion SET area_de_trabajo = '$this->area_de_trabajo', tipo_unidad_investigacion = '$this->tipo_unidad_investigacion', responsable_del_grupo = '$this->responsable_del_grupo', nombre = '$this->nombre', unidad_investigacion = '$this->unidad_investigacion' WHERE id_grupo = '$this->id_grupo' ");
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}
	

	public function eliminar(){

		try
			{	
				$sql = $this->pdo->prepare("DELETE FROM grupo_de_investigacion WHERE id_grupo = '$this->id_grupo'");
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function listar(){
	
		try
			{	
				$query = $this->pdo->prepare("SELECT * FROM grupo_de_investigacion");
				$query->execute();
				return $query->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}

}
?>