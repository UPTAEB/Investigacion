<?php 
/**
MODELO DE COMUNIDAD:

METODOS:


**/
require_once "database/conexion.php";
class Modelo_comunidad{

	private $pdo;
	private $id_comunidad;
	private $nombre;
	private $rif;
	private $municipio;
	private $parroquia;
	private $estado;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function set_id_comunidad($id_comunidad){$this->id_comunidad = $id_comunidad;}
	public function get_id_comunidad(){return $this->id_comunidad;}

	public function set_nombre($nombre){$this->nombre = $nombre;}
	public function get_nombre(){return $this->nombre;}
	
	public function set_rif($rif){$this->rif = $rif;}
	public function get_rif(){return $this->rif;}

	public function set_municipio($municipio){$this->municipio = $municipio;}
	public function get_municipio(){return $this->municipio;}
	
	public function set_parroquia($parroquia){$this->parroquia = $parroquia;}
	public function get_parroquia(){return $this->parroquia;}
	
	public function set_estado($estado){$this->estado = $estado;}
	public function get_estado(){return $this->estado;}
	
	public function insertar(){

		try
			{	
				$sql = $this->pdo->prepare("INSERT INTO comunidad(nombre, rif, municipio, 
            parroquia, estado) VALUES ('$this->nombre','$this->rif','$this->municipio','$this->parroquia','$this->estado')");
				$result = $sql->execute();
				return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function actualizar(){

		try
			{	
				$sql = $this->pdo->prepare("UPDATE comunidad SET nombre = '$this->nombre', rif = '$this->rif', parroquia = '$this->parroquia', estado = '$this->estado', municipio = '$this->municipio' WHERE id_comunidad = '$this->id_comunidad'");
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}
	

	public function eliminar(){

		try
			{	
				$sql = $this->pdo->prepare("DELETE FROM comunidad WHERE id_comunidad = '$this->id_comunidad'");
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function listar(){
	
		try
			{	
				$query = $this->pdo->prepare("SELECT * FROM comunidad");
				$query->execute();
				return $query->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}

}
?>