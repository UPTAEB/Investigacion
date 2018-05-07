<?php

require_once 'conexion.php'; //incluimos el archivo de php de conexion

// heredamos la clase conexion
class GrupoInv extends Conexion
{
	//definimo los atributos de nuestra clase
	protected $id_grupo;
	protected $fecha_registro;
	protected $area_de_trabajo;
	protected $tipo_unidad_investigacion;
	protected $nombre;
	protected $unidad_trabajo;
	protected $tutor;

	public function __construct()
	{
		//llamamos  el metodo de crear la conexion previamente definido en la clase Conexion
		Conexion::realizarConexion();
	}

	//realizamos los metodos  set y get  de cada uno de los atributos
	public function setId_Grupo($id_grupo)
	{
		$this->id_grupo = $id_grupo;
	}
	public function getId_Grupo()
	{
		return $this->id_grupo;
	}

	public function setFechaRegistro($fecha_registro)
	{
		$this->fecha_registro = $fecha_registro;
	}
	public function getFechaRegistro()
	{
		return $this->fecha_registro;
	}

	public function setArea_De_Trabajo($area_de_trabajo)
	{
		$this->area_de_trabajo = $area_de_trabajo;
	}
	public function getArea_De_Trabajo()
	{
		return $this->area_de_trabajo;
	}

		public function setTipo_Unidad_Investigacion($tipo_unidad_investigacion)
	{
		$this->tipo_unidad_investigacion = $tipo_unidad_investigacion;
	}
	public function getTipo_Unidad_Investigacion()
	{
		return $this->tipo_unidad_investigacion;
	}

		public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}
	public function getNombre()
	{
		return $this->nombre;
	}

		public function setUnidad_Trabajo($unidad_trabajo)
	{
		$this->unidad_trabajo = $unidad_trabajo;
	}
	public function getUnidad_Trabajo()
	{
		return $this->unidad_trabajo;
	}

	public function setTutor($tutor)
	{
		$this->tutor = $tutor;
	}
	public function getTutor()
	{
		return $this->tutor;
	}

	//metodos para operar con la base de datos
	public function registrar()
	{
		if (Conexion::getEstatusConexion()) { //verificamos que la conexion esta activa
			$strSql = 'INSERT INTO grupo_de_investigacion (fecha_registro, area_de_trabajo, tipo_unidad_investigacion, nombre, unidad_trabajo, tutor) VALUES (:fecha_registro, :area_de_trabajo, :tipo_unidad_investigacion, :nombre, :unidad_trabajo, :tutor)'; //realizamos una cadena de texto con la instruccion sql a realizar
			$respuestaArreglo = '';  //definimos la variable a retornar los datos de la ejecucion de la instruccion sql
			try {
				$strExec = Conexion::prepare($strSql); // preparamos la sentencia
				//  http://php.net/manual/es/pdo.prepare.php
				$strExec->bindValue(':fecha_registro', $this->fecha_registro); // Vincula un valor a un parámetro
				$strExec->bindValue(':area_de_trabajo', $this->area_de_trabajo); // Vincula un valor a un parámetro
				$strExec->bindValue(':tipo_unidad_investigacion', $this->tipo_unidad_investigacion); // Vincula un valor a un parámetro
				$strExec->bindValue(':nombre', $this->nombre); // Vincula un valor a un parámetro
				$strExec->bindValue(':unidad_trabajo', $this->unidad_trabajo); // Vincula un valor a un parámetro
				$strExec->bindValue(':tutor', $this->tutor); // Vincula un valor a un parámetro
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
			$strSql = 'SELECT  *FROM grupo_de_investigacion WHERE nombre=:nombre';
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

	public function getById($id_grupo)
	{
		if (Conexion::getEstatusConexion()) {
			$strSql = 'SELECT  *FROM grupo_de_investigacion WHERE id_grupo=:id_grupo';
			$respuestaArreglo = '';
			try {
				$strExec = Conexion::prepare($strSql);

				$strExec->bindValue(':id_grupo', $id_grupo);
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

	public function getAll()
	{
		if (Conexion::getEstatusConexion()) {
			$strSql = 'SELECT  *FROM grupo_de_investigacion';
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

	public function consultarNombreUsuario()
	{
		if (Conexion::getEstatusConexion()) {
						
			$strSql = 'SELECT  *FROM grupo_de_investigacion WHERE nombre LIKE :nombre';
			$respuestaArreglo =[];
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
		$strSql = 'UPDATE grupo_de_investigacion SET fecha_registro=:fecha_registro, area_de_trabajo=:area_de_trabajo, tipo_unidad_investigacion=:tipo_unidad_investigacion, unidad_trabajo=:unidad_trabajo, tutor=:tutor WHERE nombre=:nombre'; //realizamos una cadena de texto con la instruccion sql a realizar
			$respuestaArreglo = '';  //definimos la variable a retornar los datos de la ejecucion de la instruccion sql
			try {
				$strExec = Conexion::prepare($strSql); // preparamos la sentencia
				//  http://php.net/manual/es/pdo.prepare.php
				$strExec->bindValue(':nombre', $this->nombre); // Vincula un valor a un parámetro
				// http://php.net/manual/es/pdostatement.bindvalue.php
				$strExec->bindValue(':fecha_registro', $this->fecha_registro);
				$strExec->bindValue(':area_de_trabajo', $this->area_de_trabajo);
				$strExec->bindValue(':tipo_unidad_investigacion', $this->tipo_unidad_investigacion);
				$strExec->bindValue(':unidad_trabajo', $this->unidad_trabajo);
				$strExec->bindValue(':tutor', $this->tutor);
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
			$strSql = 'DELETE FROM grupo_de_investigacion WHERE nombre=:nombre';
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