<?php 

require_once 'conexion.php'; //incluimos el archivo de php de conexion

class Comunidad extends Conexion
{
	protected $id_comunidad;
	protected $nombre;
	protected $rif;
	protected $municipio;
	protected $estado;
	protected $parroquia;

	function __construct()
	{
		Conexion::realizarConexion();
	}

	public function setId_Comunidad($id_comunidad)
	{
		$this->id_comunidad =$id_comunidad;
	}
	public function getId_comunidad()
	{
		return $this->id_comunidad;
	}

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}
	public function getNombre()
	{
		return $this->nombre;
	}

	public function setRif($rif)
	{
		$this->rif =$rif;
	}
	public function getRif()
	{
	return $this->rif;
	}

	public function setMunicipio($municipio)
	{
	$this->municipio =$municipio;
	}
	public function getMunicipio()
	{
	return $this->municipio;
	}

	public function setEstado($estado)
	{
	$this->estado =$estado;
	}
	public function getEstado()
	{
	return $this->estado;
	}

	public function setParroquia($parroquia)
	{
	$this->parroquia =$parroquia;
	}
	public function getParroquia()
	{
	return $this->parroquia;
	}

public function registrar()
	{
		if (Conexion::getEstatusConexion()) { //verificamos que la conexion esta activa
			$strSql = 'INSERT INTO comunidad (nombre, rif, municipio, estado, parroquia ) VALUES (:nombre, :rif, :municipio, :estado, :parroquia)';
			$respuestaArreglo = '';
			try {
				$strExec = Conexion::prepare($strSql); 
				$strExec->bindValue(':nombre', $this->nombre); 
				$strExec->bindValue(':rif', $this->rif);
				$strExec->bindValue(':municipio', $this->municipio);
				$strExec->bindValue(':estado', $this->estado);
				$strExec->bindValue(':parroquia', $this->parroquia);
				$strExec->execute(); //ejecutamos la instruccion sql
				$respuestaArreglo = $strExec->fetchAll(); //retornamos todos los datos de la ejecucion
				$respuestaArreglo += ['estatus' => true];
			} catch (PDOException $e) { //si hay un error en la instruccion sql entramos en el catch
				$errorReturn = ['estatus' => false];
				$errorReturn += ['info' => "error sql:{$e}"];

				return $errorReturn; //retornamos el contenido de esa variable
			}
			$respuestaI = Conexion::lastInsertId(); //obtenemos ID (clave primaria de la tabla) para implementarlo en otros registros
			return $respuestaArreglo; //retornamos los datos del arreglo
		} else { //sino hay conexion
			$errorReturn = ['estatus' => false];
			$errorReturn += ['info' => 'error sql:'.Conexion::getErrorConexion()];

			return $errorReturn; //retorno el mensaje de error generado
		}
	}

	public function consultar()
	{
		if (Conexion::getEstatusConexion()) {
			$strSql = 'SELECT rif, nombre, municipio, estado, parroquia FROM comunidad WHERE rif=:rif';
			$respuestaArreglo = '';
			try {
				$strExec = Conexion::prepare($strSql);

				$strExec->bindValue(':rif', $this->rif);
				$strExec->execute();
				$respuestaArreglo = $strExec->fetchAll();
				$respuestaArreglo += ['estatus' => true];
			} catch (PDOException $e) {
				$errorReturn = ['estatus' => false];
				$errorReturn += ['info' => "error sql:{$e}"];

				return $errorReturn;
			}

			return $respuestaArreglo;
		} else {
			$errorReturn = ['estatus' => false];
			$errorReturn += ['info' => 'error sql:'.Conexion::getErrorConexion()];

			return $errorReturn;
		}
	}

	public function consultarNombreUsuario()
	{
		if (Conexion::getEstatusConexion()) {

			$strSql = 'SELECT  id_comunidad, rif, nombre, municipio, estado, parroquia FROM comunidad WHERE nombre LIKE :nombre';
			$respuestaArreglo = '';
			try {
				$strExec = Conexion::prepare($strSql);
				$strExec->bindValue(':nombre', "%$this->nombre%");
				$strExec->execute();
				$respuestaArreglo = $strExec->fetchAll();
				$respuestaArreglo += ['estatus' => true];
			} catch (PDOException $e) {
				$errorReturn = ['estatus' => false];
				$errorReturn += ['info' => "error sql:{$e}"];

				return $errorReturn;
			}

			return $respuestaArreglo;
		} else {
			$errorReturn = ['estatus' => false];
			$errorReturn += ['info' => 'error sql:'.Conexion::getErrorConexion()];

			return $errorReturn;
		}
	}

	public function actualizar()
	{
		if (Conexion::getEstatusConexion()) { //verificamos que la conexion esta activa
		$strSql = 'UPDATE comunidad SET nombre=:nombre, parroquia=:parroquia, estado=:estado, municipio=:municipio WHERE rif=:rif'; //realizamos una cadena de texto con la instruccion sql a realizar
			$respuestaArreglo = '';  //definimos la variable a retornar los datos de la ejecucion de la instruccion sql
			try {
				$strExec = Conexion::prepare($strSql); // preparamos la sentencia
				$strExec->bindValue(':rif', $this->rif); // Vincula un valor a un parámetro
				$strExec->bindValue(':nombre', $this->nombre);
				$strExec->bindValue(':parroquia', $this->parroquia);
				$strExec->bindValue(':estado', $this->estado);
				$strExec->bindValue(':municipio', $this->municipio);
				$strExec->execute(); //ejecutamos la instruccion sql
				$respuestaArreglo = $strExec->fetchAll(); //retornamos todos los datos de la ejecucion
				$respuestaArreglo += ['estatus' => true];
			} catch (PDOException $e) { //si hay un error en la instruccion sql entramos en el catch
				$errorReturn = ['estatus' => false];
				$errorReturn += ['info' => "error sql:{$e}"];

				return $errorReturn; //retornamos el contenido de esa variable
			}

			return $respuestaArreglo; //retornamos los datos del arreglo
		} else { //sino hay conexion
			$errorReturn = ['estatus' => false];
			$errorReturn += ['info' => 'error sql:'.Conexion::getErrorConexion()];

			return $errorReturn; //retorno el mensaje de error generado
		}
	}

	public function eliminar()
	{
		if (Conexion::getEstatusConexion()) {
			$strSql = 'DELETE FROM comunidad WHERE rif=:rif';
			$respuestaArreglo = '';
			try {
				$strExec = Conexion::prepare($strSql);

				$strExec->bindValue(':rif', $this->rif);
				$strExec->execute();
				$respuestaArreglo = $strExec->fetchAll();
				$respuestaArreglo += ['estatus' => true];
			} catch (PDOException $e) {
				$errorReturn = ['estatus' => false];
				$errorReturn += ['info' => "error sql:{$e}"];

				return $errorReturn;
			}

			return $respuestaArreglo;
		} else {
			$errorReturn = ['estatus' => false];
			$errorReturn += ['info' => 'error sql:'.Conexion::getErrorConexion()];

			return $errorReturn;
		}
	}

	public function __destruct()
	{//metodo destructor de la clase
		parent::cerrarConexion(); //ejecutamos la simulacion de cierre de conexion
	}
}
 ?>