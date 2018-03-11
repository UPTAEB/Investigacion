<?php 
/**
MODELO DE USUARIO:

METODOS:


**/
require_once "database/conexion.php";
class Modelo_Proyecto{

	private $pdo;
	private $id;
	private $id_comunidad;
	private $id_macroproyecto;
	private $id_linea_investigacion;
	private $id_grupo;
	private $titulo;
	private $objetivo_general;
    private $objetivo_especifico;
    private $resumen;
	
	
	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function set_id($id){$this->id = $id;}
	public function get_id(){return $this->id;}

	public function set_id_comunidad($id_comunidad){$this->id_comunidad = $id_comunidad;}
	public function get_id_comunidad(){return $this->id_comunidad;}
	
	public function set_id_macroproyecto($id_macroproyecto){$this->id_macroproyecto = $id_macroproyecto;}
	public function get_id_macroproyecto(){return $this->id_macroproyecto;}

	public function set_id_linea_investigacion($id_linea_investigacion){$this->id_linea_investigacion = $id_linea_investigacion;}
	public function get_id_linea_investigacion(){return $this->id_linea_investigacion;}
	
	public function set_id_grupo($id_grupo){$this->id_grupo = $id_grupo;}
	public function get_id_grupo(){return $this->id_grupo;}
	
	public function set_titulo($titulo){$this->titulo = $titulo;}
	public function get_titulo(){return $this->titulo;}
	
	public function set_objetivo_general($objetivo_general){$this->objetivo_general = $objetivo_general;}
	public function get_objetivo_general(){return $this->objetivo_general;}

	public function set_objetivo_especifico($objetivo_especifico){$this->objetivo_especifico = $objetivo_especifico;}
	public function get_objetivo_especifico(){return $this->objetivo_especifico;}

	public function set_resumen($resumen){$this->resumen = $resumen;}
	public function get_resumen(){return $this->resumen;}
	
	
	public function insertar(){

		try
			{	
				$sql = $this->pdo->prepare("INSERT INTO proyecto(id_comunidad, id_macroproyecto, 
            id_grupo, titulo, objetivo_general, objetivo_especifico, resumen) VALUES ('$this->id_comunidad','$this->id_macroproyecto','$this->id_grupo','$this->titulo','$this->objetivo_general','$this->objetivo_especifico','$this->resumen')");
				$result = $sql->execute();
				return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function actualizar(){

		try
			{	
				$sql = $this->pdo->prepare("UPDATE proyecto SET id_comunidad = '$this->id_comunidad', id_macroproyecto = '$this->id_macroproyecto', id_grupo = '$this->id_grupo', titulo = '$this->titulo', objetivo_general = '$this->objetivo_general', objetivo_especifico = '$this->objetivo_especifico' , resumen = '$this->resumen' WHERE id = '$this->id'");
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}
	

	public function eliminar(){

		try
			{	
				$sql = $this->pdo->prepare("DELETE FROM proyecto WHERE id = '$this->id'");
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function todos(){
	
		try
			{	
				$query = $this->pdo->prepare("SELECT * FROM proyecto");
				$query->execute();
				return $query->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}

	public function consultar(){
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM usuario , categoria WHERE usuario.fk_categoria = categoria.id_categoria and usuario.id_usuario = '$this->id'");
        		$sql->execute(); 
    			return $sql->fetch(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	
}
?>