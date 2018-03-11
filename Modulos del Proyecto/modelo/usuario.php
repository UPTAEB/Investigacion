<?php 
/**
MODELO DE USUARIO:

METODOS:


**/
require_once "database/conexion.php";
class Modelo_usuario{

	private $pdo;
	private $id_usuario;
	private $nombre;
	private $apellido;
	private $sexo;
	private $direccion;
	private $clave;
	private $rol;

	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function set_id_usuario($id_usuario){$this->id_usuario = $id_usuario;}
	public function get_id_usuario(){return $this->id_usuario;}

	public function set_nombre($nombre){$this->nombre = $nombre;}
	public function get_nombre(){return $this->nombre;}
	
	public function set_cedula($cedula){$this->cedula = $cedula;}
	public function get_cedula(){return $this->cedula;}

	public function set_apellido($apellido){$this->apellido = $apellido;}
	public function get_apellido(){return $this->apellido;}
	
	public function set_sexo($sexo){$this->sexo = $sexo;}
	public function get_sexo(){return $this->sexo;}
	
	public function set_correo($correo){$this->correo = $correo;}
	public function get_correo(){return $this->correo;}
	
	public function set_telefono($telefono){$this->telefono = $telefono;}
	public function get_telefono(){return $this->telefono;}

	public function set_direccion($direccion){$this->direccion = $direccion;}
	public function get_direccion(){return $this->direccion;}

	public function set_clave($clave){$this->clave = $clave;}
	public function get_clave(){return $this->clave;}

	public function set_rol($rol){$this->rol = $rol;}
	public function get_rol(){return $this->rol;}

	
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
				$query = $this->pdo->prepare("SELECT * FROM usuario");
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

	public function consultar_cedula(){
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM usuario , categoria WHERE usuario.fk_categoria = categoria.id_categoria and usuario.usuario_cedula = '$this->cedula'");
        		$sql->execute(); 
    			return $sql->fetch(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}
	
	public function buscar(){
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM usuario where id_usuario='$this->$id_usuario'");
        		$sql->execute(); 
    			return $sql->fetch(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function validar_usuario(){
   		
		try
			{	
				$sql = $this->pdo->prepare("select * from usuario where nombre = '".$this->nombre."' and clave = '".$this->clave."'");
        		$sql->execute(); 
    			return $sql->fetch(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function validar_correo(){
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM usuario WHERE usuario_correo = '$this->correo'");
        		$sql->execute(); 
    			return $sql->fetch(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function cambiar_estado(){
		try
			{	
				$sql = $this->pdo->prepare("UPDATE usuario SET usuario_estado = '$this->estado' WHERE id_usuario='$this->id'");
        		$sql->execute(); 
    			return $sql->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function cambiar_clave(){
		try
			{	
				$sql = $this->pdo->prepare("UPDATE usuario SET clave = '$this->clave' WHERE id_usuario='$this->id'");
        		$sql->execute(); 
    			return $sql->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function obtener_ultimo_usuario(){
	
		try
			{	
				$sql = $this->pdo->prepare("SELECT MAX(id_usuario) as ultimo FROM usuario");
        		$sql->execute();
    			return $sql->fetch(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}

	public function actualizar_categoria(){
		try
			{	
				$sql = $this->pdo->prepare("UPDATE usuario SET fk_categoria = '$this->fk_categoria' WHERE id_usuario = '$this->id'");
        		
    			return $sql->execute(); 
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function reportar_usuarios(){
	
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM usuario,categoria,usuario_rol,rol,usuario_departamento,departamento where usuario.fk_categoria = categoria.id_categoria and usuario_departamento.fk_usuario = usuario.id_usuario and usuario_departamento.fk_departamento = departamento.id_departamento and usuario_rol.fk_usuario = usuario.id_usuario and usuario_rol.fk_rol = rol.id_rol");
				$sql->execute();
				return $sql->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}

	public function reportar_usuarios_fecha($desde,$hasta){
	
		try
			{	
				$sql = $this->pdo->prepare("SELECT * FROM usuario,categoria,usuario_rol,rol,usuario_departamento,departamento where usuario.fk_categoria = categoria.id_categoria and usuario_departamento.fk_usuario = usuario.id_usuario and usuario_departamento.fk_departamento = departamento.id_departamento and usuario_rol.fk_usuario = usuario.id_usuario and usuario_rol.fk_rol = rol.id_rol and usuario.usuario_fecha_registro BETWEEN ('$desde') AND ('$hasta')");
				$sql->execute();
				return $sql->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}

	public function reportar_usuario_categoria($desde,$hasta){
		try
			{	
				$sql = $this->pdo->prepare("SELECT usuario.*,rol.*,departamento.*,categoria.* FROM usuario,usuario_departamento,departamento,categoria,usuario_rol,rol WHERE usuario_departamento.fk_departamento = departamento.id_departamento and usuario_departamento.fk_usuario = usuario.id_usuario and usuario_rol.fk_rol = rol.id_rol and usuario_rol.fk_usuario = usuario.id_usuario and usuario.fk_categoria = categoria.id_categoria and categoria.id_categoria = '$this->fk_categoria' and usuario.usuario_fecha_registro BETWEEN ('$desde') AND ('$hasta')");
        		$sql->execute(); 
    			return $sql->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}

	public function reportar_usuarios_filtrados($id_departamento,$id_categoria,$desde,$hasta){
		try
			{	
				$sql = $this->pdo->prepare("SELECT usuario.*,rol.*,departamento.*,categoria.* FROM usuario,usuario_departamento,departamento,categoria,usuario_rol,rol WHERE usuario_departamento.fk_departamento = departamento.id_departamento and usuario_departamento.fk_usuario = usuario.id_usuario and usuario_rol.fk_rol = rol.id_rol and usuario_rol.fk_usuario = usuario.id_usuario and usuario.fk_categoria = categoria.id_categoria and departamento.id_departamento = '$id_departamento' and categoria.id_categoria = '$id_categoria' and usuario.usuario_fecha_registro BETWEEN ('$desde') AND ('$hasta')");
        		$sql->execute(); 
    			return $sql->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}			
	}
}
?>