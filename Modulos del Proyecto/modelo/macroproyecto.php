<?php 
/**
MODELO DE MACROPROYECTO:

METODOS:


**/
require_once "database/conexion.php";
class Modelo_macroproyecto{

	private $pdo;
	private $id;
	private $id_programa;
	private $nombre;
	private $objetivo_estrategico;
	private $coordinador;
	private $estatus;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function set_id($id){$this->id = $id;}
	public function get_id(){return $this->id;}

	public function set_id_programa($id_programa){$this->id_programa = $id_programa;}
	public function get_id_programa(){return $this->id_programa;}
	
	public function set_nombre($nombre){$this->nombre = $nombre;}
	public function get_nombre(){return $this->nombre;}

	public function set_objetivo_estrategico($objetivo_estrategico){$this->objetivo_estrategico = $objetivo_estrategico;}
	public function get_objetivo_estrategico(){return $this->objetivo_estrategico;}
	
	public function set_coordinador($coordinador){$this->coordinador = $coordinador;}
	public function get_coordinador(){return $this->coordinador;}
	
	public function set_estatus($estatus){$this->estatus = $estatus;}
	public function get_estatus(){return $this->estatus;}
	
	public function insertar(){

		try
			{	
				$sql = $this->pdo->prepare("INSERT INTO usuario(cedula, nombre, apellido, 
            sexo, telefono, correo, direccion, clave, rol) VALUES ('$this->cedula','$this->nombre','$this->apellido','$this->sexo','$this->telefono','$this->correo','$this->direccion','$this->clave','$this->rol')");
				$result = $sql->execute();
				return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function actualizar(){

		try
			{	
				$sql = $this->pdo->prepare("UPDATE usuario SET nombre = '$this->nombre', apellido = '$this->apellido', sexo = '$this->sexo', telefono = '$this->telefono', correo = '$this->correo', direccion = '$this->direccion', cedula = '$this->cedula', clave = '$this->clave', rol = '$this->rol' WHERE id_usuario = '$this->id_usuario'");
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}
	

	public function eliminar(){

		try
			{	
				$sql = $this->pdo->prepare("DELETE FROM usuario WHERE id_usuario = '$this->id_usuario'");
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function listar(){
	
		try
			{	
				$query = $this->pdo->prepare("SELECT * FROM macroproyecto");
				$query->execute();
				return $query->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}

}
?>