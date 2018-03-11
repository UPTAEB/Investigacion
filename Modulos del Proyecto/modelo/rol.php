<?php 
/**
MODELO DE ROL:

METODOS:


**/
require_once "database/conexion.php";
class Modelo_rol{

	private $pdo;
	private $id;
	private $nombre_rol;
	private $codigo_rol;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function set_id($id){$this->id = $id;}
	public function get_id(){return $this->id;}

	public function set_nombre_rol($nombre_rol){$this->nombre_rol = $nombre_rol;}
	public function get_nombre_rol(){return $this->nombre_rol;}
	
	public function set_codigo_rol($codigo_rol){$this->codigo_rol = $codigo_rol;}
	public function get_codigo_rol(){return $this->codigo_rol;}
	
	public function insertar(){

		try
			{	
				$sql = $this->pdo->prepare("INSERT INTO rol(nombre_rol, codigo_rol) VALUES ('$this->nombre_rol','$this->codigo_rol')");
				$result = $sql->execute();
				return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function actualizar(){

		try
			{	
				$sql = $this->pdo->prepare("UPDATE rol SET nombre_rol = '$this->nombre_rol', codigo_rol = '$this->codigo_rol' WHERE id = '$this->id'");
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}
	

	public function eliminar(){

		try
			{	
				$sql = $this->pdo->prepare("DELETE FROM rol WHERE id = '$this->id'");
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function listar(){
	
		try
			{	
				$query = $this->pdo->prepare("SELECT * FROM rol");
				$query->execute();
				return $query->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}

	
}
?>