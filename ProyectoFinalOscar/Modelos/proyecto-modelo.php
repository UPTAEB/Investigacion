<?php

require_once 'conexion.php'; //incluimos el archivo de php de conexion

// heredamos la clase conexion
class Proyecto extends Conexion
{
	//definimo los atributos de nuestra clase
	protected $id_proyecto;
	protected $titulo;
	protected $objetivo_general;
	protected $objetivo_especifico;
	protected $id_comunidad;
	protected $id_macroproyecto;
	protected $id_linea_investigacion;

	public function __construct()
	{
		//llamamos  el metodo de crear la conexion previamente definido en la clase Conexion
		Conexion::realizarConexion();
	}

	//realizamos los metodos  set y get  de cada uno de los atributos
	public function setId_Proyecto($id_proyecto)
	{
		$this->id_proyecto = $id_proyecto;
	}
	public function getId_Proyecto()
	{
		return $this->id_proyecto;
	}

	public function setTitulo($titulo)
	{
		$this->titulo = $titulo;
	}
	public function getTitulo()
	{
		return $this->titulo;
	}

	public function setObjetivo_General($objetivo_general)
	{
		$this->objetivo_general = $objetivo_general;
	}
	public function getObjetivo_General()
	{
		return $this->objetivo_general;
	}

		public function setObjetivo_Especifico($objetivo_especifico)
	{
		$this->objetivo_especifico = $objetivo_especifico;
	}
	public function getObjetivo_Especifico()
	{
		return $this->objetivo_especifico;
	}

		public function setId_Comunidad($id_comunidad)
	{
		$this->id_comunidad = $id_comunidad;
	}
	public function getId_Comunidad()
	{
		return $this->id_comunidad;
	}

	public function setId_Macroproyecto($id_macroproyecto)
	{
		$this->id_macroproyecto = $id_macroproyecto;
	}
	public function getId_Macroproyecto()
	{
		return $this->id_macroproyecto;
	}

	public function setId_linea_investigacion($id_linea_investigacion)
	{
		$this->id_linea_investigacion = $id_linea_investigacion;
	}
	public function getId_linea_investigacion()
	{
		return $this->id_linea_investigacion;
	}

		public function getLastId()
	{
		if (Conexion::getEstatusConexion()) {
			$strSql = 'SELECT id_proyecto FROM proyecto ORDER BY id_proyecto  DESC LIMIT 1;';
			$respuestaArreglo = [];
			$id = 0;
			try {
				$strExec = Conexion::prepare($strSql);
				$strExec->execute();
				$respuestaArreglo = $strExec->fetchAll();
				foreach ($respuestaArreglo as $valor) {
					$id = $valor['id_proyecto'];
				}
			} catch (PDOException $e) {
				
				return $id;
			}

			return $id;
		} else {
			return $id;
		}
	}

	//metodos para operar con la base de datos
	public function registrar()
	{
		if (Conexion::getEstatusConexion()) { //verificamos que la conexion esta activa
			$strSql = 'INSERT INTO proyecto (titulo, objetivo_general, objetivo_especifico, id_comunidad, id_macroproyecto, id_linea_investigacion) VALUES (:titulo, :objetivo_general, :objetivo_especifico, :id_comunidad, :id_macroproyecto, :id_linea_investigacion)'; //realizamos una cadena de texto con la instruccion sql a realizar
			$respuestaArreglo = '';  //definimos la variable a retornar los datos de la ejecucion de la instruccion sql
			try {
				$strExec = Conexion::prepare($strSql); // preparamos la sentencia
				//  http://php.net/manual/es/pdo.prepare.php
				$strExec->bindValue(':titulo', $this->titulo); // Vincula un valor a un parámetro
				$strExec->bindValue(':objetivo_general', $this->objetivo_general); // Vincula un valor a un parámetro
				$strExec->bindValue(':objetivo_especifico', $this->objetivo_especifico); // Vincula un valor a un parámetro
				$strExec->bindValue(':id_comunidad', $this->id_comunidad);
				$strExec->bindValue(':id_macroproyecto', $this->id_macroproyecto);
				$strExec->bindValue(':id_linea_investigacion', $this->id_linea_investigacion);
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
			$strSql = 'SELECT *FROM proyecto WHERE titulo=:titulo';
			$respuestaArreglo = '';
			try {
				$strExec = Conexion::prepare($strSql);

				$strExec->bindValue(':titulo', $this->titulo);
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

	public function consultarProyecto()
	{
		if (Conexion::getEstatusConexion()) {
						
			$strSql = 'SELECT  *FROM proyecto WHERE titulo LIKE :titulo';
			$respuestaArreglo = '';
			try {
				$strExec = Conexion::prepare($strSql);
				$strExec->bindValue(':titulo', "%$this->titulo%");
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
		$strSql = 'UPDATE proyecto SET objetivo_general=:objetivo_general, objetivo_especifico=:objetivo_especifico WHERE titulo=:titulo'; //realizamos una cadena de texto con la instruccion sql a realizar
			$respuestaArreglo = '';  //definimos la variable a retornar los datos de la ejecucion de la instruccion sql
			try {
				$strExec = Conexion::prepare($strSql); // preparamos la sentencia
				//  http://php.net/manual/es/pdo.prepare.php
				$strExec->bindValue(':titulo', $this->titulo); // Vincula un valor a un parámetro
				// http://php.net/manual/es/pdostatement.bindvalue.php
				$strExec->bindValue(':objetivo_general', $this->objetivo_general);
				$strExec->bindValue(':objetivo_especifico', $this->objetivo_especifico);
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
			$strSql = 'DELETE FROM proyecto WHERE titulo=:titulo';
			$respuestaArreglo = '';
			try {
				$strExec = Conexion::prepare($strSql);

				$strExec->bindValue(':titulo', $this->titulo);
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