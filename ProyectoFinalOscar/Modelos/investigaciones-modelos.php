<?php

require_once 'conexion.php'; //incluimos el archivo de php de conexion

// heredamos la clase conexion
class Investigaciones extends Conexion
{
	//definimo los atributos de nuestra clase
	protected $id_investigacion;
	protected $id_grupo;
	protected $id_linea_investigacion;
	protected $nombre;
	protected $tipo_de_investigacion;
	protected $fecha_inicio;
	protected $fecha_culminacion;

	public function __construct()
	{
		//llamamos  el metodo de crear la conexion previamente definido en la clase Conexion
		Conexion::realizarConexion();
	}

	//realizamos los metodos  set y get  de cada uno de los atributos
	public function setId_Investigacion($id_investigacion)
	{
		$this->id_investigacion = $id_investigacion;
	}

	public function getId_Investigacion()
	{
		return $this->id_investigacion;
	}

	public function setId_Grupo($id_grupo)
	{
		$this->id_grupo = $id_grupo;
	}

	public function getId_Grupo()
	{
		return $this->id_grupo;
	}

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}
	public function getNombre()
	{
		return $this->nombre;
	}

	public function setTipoDeInvestigacion($tipo_de_investigacion)
	{
		$this->tipo_de_investigacion = $tipo_de_investigacion;
	}
	public function getTipoDeInvestigacion()
	{
		return $this->tipo_de_investigacion;
	}

		public function setFecha_Inicio($fecha_inicio)
	{
		$this->fecha_inicio = $fecha_inicio;
	}

	public function getFecha_Inicio()
	{
		return $this->fecha_inicio;
	}

	public function setFecha_Culminacion($fecha_culminacion)
	{
		$this->fecha_culminacion = $fecha_culminacion;
	}

	public function getFecha_Culminacion()
	{
		return $this->fecha_culminacion;
	}


	//metodos para operar con la base de datos

		public function getLastId2()
	{
		if (Conexion::getEstatusConexion()) {
			$strSql = 'SELECT id_investigacion FROM investigaciones ORDER BY id_investigacion  DESC LIMIT 1;';
			$respuestaArreglo = [];
			$id = 0;
			try {
				$strExec = Conexion::prepare($strSql);
				$strExec->execute();
				$respuestaArreglo = $strExec->fetchAll();
				foreach ($respuestaArreglo as $valor) {
					$id = $valor['id_investigacion'];
				}
			} catch (PDOException $e) {
				
				return $id;
			}

			return $id;
		} else {
			return $id;
		}
	}

	public function LastId()
	{
		if (Conexion::getEstatusConexion()) {
			$strSql = 'SELECT MAX(id_investigacion) as mayor FROM investigaciones;';
			$respuestaArreglo = [];
			try {
				$strExec = Conexion::prepare($strSql);

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

	public function registrar()
	{
		if (Conexion::getEstatusConexion()) { //verificamos que la conexion esta activa
			$strSql = 'INSERT INTO investigaciones (nombre, tipo_de_investigacion, fecha_inicio, fecha_culminacion, id_grupo) VALUES (:nombre, :tipo_de_investigacion, :fecha_inicio, :fecha_culminacion, :id_grupo)'; //realizamos una cadena de texto con la instruccion sql a realizar
			$respuestaArreglo = '';  //definimos la variable a retornar los datos de la ejecucion de la instruccion sql
			try {
				$strExec = Conexion::prepare($strSql); // preparamos la sentencia
				//  http://php.net/manual/es/pdo.prepare.php
				$strExec->bindValue(':nombre', $this->nombre);
				$strExec->bindValue(':fecha_inicio', $this->fecha_inicio);
				$strExec->bindValue(':fecha_culminacion', $this->fecha_culminacion);
				$strExec->bindValue(':tipo_de_investigacion', $this->tipo_de_investigacion); // Vincula un valor a un parámetro
				$strExec->bindValue(':id_grupo', $this->id_grupo);
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
			$strSql = 'SELECT *FROM investigaciones WHERE nombre=:nombre';
			$respuestaArreglo = '';
			try {
				$strExec = Conexion::prepare($strSql);

				$strExec->bindValue(':nombre', $this->nombre);
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

	public function consultar2()
	{
		if (Conexion::getEstatusConexion()) {
			$strSql = 'SELECT *FROM investigaciones';
			$respuestaArreglo = '';
			try {
				$strExec = Conexion::prepare($strSql);
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

	public function getById($id_investigacion)
	{
		if (Conexion::getEstatusConexion()) {
			$strSql = 'SELECT *FROM investigaciones WHERE id_investigacion=:id_investigacion';
			$respuestaArreglo = [];
			try {
				$strExec = Conexion::prepare($strSql);

				$strExec->bindValue(':id_investigacion', $id_investigacion);
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

	public function getLastId()
	{
		if (Conexion::getEstatusConexion()) {
			$strSql = 'SELECT id_investigacion FROM investigaciones ORDER BY id_investigacion  DESC LIMIT 1;';
			$respuestaArreglo = [];
			$id = 0;
			try {
				$strExec = Conexion::prepare($strSql);
				$strExec->execute();
				$respuestaArreglo = $strExec->fetchAll();
				foreach ($respuestaArreglo as $valor) {
					$id = $valor['id_investigacion'];
				}
			} catch (PDOException $e) {
				
				return $id;
			}

			return $id;
		} else {
			return $id;
		}
	}

	public function getAll()
	{
		if (Conexion::getEstatusConexion()) {
			$strSql = 'SELECT *FROM investigaciones';
			$respuestaArreglo = '';
			try {
				$strExec = Conexion::prepare($strSql);

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

	public function consultarInvestigaciones()
	{
		if (Conexion::getEstatusConexion()) {
						
			$strSql = 'SELECT id_investigacion, id_grupo, id_grupo, nombre, tipo_de_investigacion, fecha_culminacion, fecha_inicio FROM investigaciones WHERE nombre LIKE :nombre';
			$respuestaArreglo = '';
			try {
				$strExec = Conexion::prepare($strSql);
				$strExec->bindValue(':nombre', "$this->nombre%");
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
		$strSql = 'UPDATE investigaciones SET tipo_de_investigacion=:tipo_de_investigacion, fecha_inicio=:fecha_inicio, fecha_culminacion=:fecha_culminacion WHERE nombre=:nombre'; //realizamos una cadena de texto con la instruccion sql a realizar
			$respuestaArreglo = '';  //definimos la variable a retornar los datos de la ejecucion de la instruccion sql
			try {
				$strExec = Conexion::prepare($strSql); // preparamos la sentencia
				//  http://php.net/manual/es/pdo.prepare.php
				$strExec->bindValue(':nombre', $this->nombre); // Vincula un valor a un parámetro
				$strExec->bindValue(':tipo_de_investigacion', $this->tipo_de_investigacion);
				$strExec->bindValue(':fecha_inicio', $this->fecha_inicio);
				$strExec->bindValue(':fecha_culminacion', $this->fecha_culminacion);
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
			$strSql = 'DELETE FROM investigaciones WHERE nombre=:nombre';
			$respuestaArreglo = '';
			try {
				$strExec = Conexion::prepare($strSql);

				$strExec->bindValue(':nombre', $this->nombre);
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