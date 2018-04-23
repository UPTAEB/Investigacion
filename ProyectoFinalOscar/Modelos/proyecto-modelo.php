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
	protected $resumen;
	protected $id_comunidad;
	protected $id_macroproyecto;
	protected $id_grupo;
	protected $estado;

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

		public function setResumen($resumen)
	{
		$this->resumen = $resumen;
	}
	public function getResumen()
	{
		return $this->resumen;
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

	public function setId_Grupo($id_grupo)
	{
		$this->id_grupo = $id_grupo;
	}
	public function getId_Grupo()
	{
		return $this->id_grupo;
	}

	public function setEstado($estado)
	{
		$this->estado = $estado;
	}
	public function getEstado()
	{
		return $this->estado;
	}

	//metodos para operar con la base de datos
	public function registrar()
	{
		if (Conexion::getEstatusConexion()) { //verificamos que la conexion esta activa
			$strSql = 'INSERT INTO proyecto (titulo, objetivo_general, objetivo_especifico, resumen, id_comunidad, id_macroproyecto, id_grupo, estado) VALUES (:titulo, :objetivo_general, :objetivo_especifico, :resumen, :id_comunidad, :id_macroproyecto, :id_grupo, :estado )'; //realizamos una cadena de texto con la instruccion sql a realizar
			$respuestaArreglo = '';  //definimos la variable a retornar los datos de la ejecucion de la instruccion sql
			try {
				$strExec = Conexion::prepare($strSql); // preparamos la sentencia
				//  http://php.net/manual/es/pdo.prepare.php
				$strExec->bindValue(':titulo', $this->titulo); // Vincula un valor a un parámetro
				$strExec->bindValue(':objetivo_general', $this->objetivo_general); // Vincula un valor a un parámetro
				$strExec->bindValue(':objetivo_especifico', $this->objetivo_especifico); // Vincula un valor a un parámetro
				$strExec->bindValue(':resumen', $this->resumen); // Vincula un valor a un parámetro
				$strExec->bindValue(':id_comunidad', $this->id_comunidad); // Vincula un valor a un parámetro
				$strExec->bindValue(':id_macroproyecto', $this->id_macroproyecto); // Vincula un valor a un parámetro
				$strExec->bindValue(':id_grupo', $this->id_grupo); // Vincula un valor a un parámetro
				$strExec->bindValue(':estado', $this->estado); // Vincula un valor a un parámetro
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
			$strSql = 'SELECT titulo, objetivo_general, objetivo_especifico, resumen, estado FROM proyecto WHERE titulo=:titulo';
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

	public function consultarNombreUsuario()
	{
		if (Conexion::getEstatusConexion()) {
						
			$strSql = 'SELECT  *FROM proyecto WHERE estado LIKE :estado';
			$respuestaArreglo = '';
			try {
				$strExec = Conexion::prepare($strSql);
				$strExec->bindValue(':estado', "%$this->estado%");
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
		$strSql = 'UPDATE proyecto SET objetivo_general=:objetivo_general, objetivo_especifico=:objetivo_especifico, resumen=:resumen, estado=:estado WHERE titulo=:titulo'; //realizamos una cadena de texto con la instruccion sql a realizar
			$respuestaArreglo = '';  //definimos la variable a retornar los datos de la ejecucion de la instruccion sql
			try {
				$strExec = Conexion::prepare($strSql); // preparamos la sentencia
				//  http://php.net/manual/es/pdo.prepare.php
				$strExec->bindValue(':titulo', $this->titulo); // Vincula un valor a un parámetro
				// http://php.net/manual/es/pdostatement.bindvalue.php
				$strExec->bindValue(':objetivo_general', $this->objetivo_general);
				$strExec->bindValue(':objetivo_especifico', $this->objetivo_especifico);
				$strExec->bindValue(':resumen', $this->resumen);
				$strExec->bindValue(':estado', $this->estado);
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