<?php

require_once 'conexion.php'; //incluimos el archivo de php de conexion

// heredamos la clase conexion
class Usuario extends Conexion
{
	//definimo los atributos de nuestra clase
	protected $id_usuario;
	protected $nombre;
	protected $direccion;
	protected $sexo;
	protected $clave;
	protected $apellido;
	protected $cedula;
	protected $telefono;
	protected $correo;

	public function __construct()
	{
		//llamamos  el metodo de crear la conexion previamente definido en la clase Conexion
		Conexion::realizarConexion();
	}

	//realizamos los metodos  set y get  de cada uno de los atributos
	public function setId_Usuario($id_usuario)
	{
		$this->id_usuario = $id_usuario;
	}

	public function getId_Usuario()
	{
		return $this->id_usuario;
	}

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function setDireccion($direccion)
	{
		$this->direccion = $direccion;
	}

	public function getDireccion()
	{
		return $this->direccion;
	}

		public function setSexo($sexo)
	{
		$this->sexo = $sexo;
	}

	public function getSexo()
	{
		return $this->sexo;
	}

		public function setClave($clave)
	{
		$this->clave = $clave;
	}

	public function getClave()
	{
		return $this->clave;
	}

	public function setApellido($apellido)
	{
		$this->apellido = $apellido;
	}

	public function getApellido()
	{
		return $this->apellido;
	}

		public function setCedula($cedula)
	{
		$this->cedula = $cedula;
	}

	public function getCedula()
	{
		return $this->cedula;
	}

		public function setTelefono($telefono)
	{
		$this->telefono = $telefono;
	}

	public function getTelefono()
	{
		return $this->telefono;
	}

		public function setCorreo($correo)
	{
		$this->correo = $correo;
	}

	public function getCorreo()
	{
		return $this->correo;
	}


	//metodos para operar con la base de datos
	public function registrar()
	{
		if (Conexion::getEstatusConexion()) { //verificamos que la conexion esta activa
			$strSql = 'INSERT INTO usuario (nombre, direccion, clave, apellido, cedula, telefono, correo) VALUES (:nombre, :direccion, :clave, :apellido, :cedula, :telefono, :correo )'; //realizamos una cadena de texto con la instruccion sql a realizar
			$respuestaArreglo = '';  //definimos la variable a retornar los datos de la ejecucion de la instruccion sql
			try {
				$strExec = Conexion::prepare($strSql); // preparamos la sentencia
				//  http://php.net/manual/es/pdo.prepare.php
				$strExec->bindValue(':nombre', $this->nombre); // Vincula un valor a un parámetro
				$strExec->bindValue(':direccion', $this->direccion); // Vincula un valor a un parámetro
				$strExec->bindValue(':clave', $this->clave); // Vincula un valor a un parámetro
				$strExec->bindValue(':apellido', $this->apellido); // Vincula un valor a un parámetro
				$strExec->bindValue(':cedula', $this->cedula); // Vincula un valor a un parámetro
				$strExec->bindValue(':telefono', $this->telefono); // Vincula un valor a un parámetro
				$strExec->bindValue(':correo', $this->correo); // Vincula un valor a un parámetro
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

	public function ExisteUsuario()
	{
		if (Conexion::getEstatusConexion()) {
			$strSql = 'SELECT *FROM usuario WHERE clave=:clave AND correo=:correo';
			$respuestaArreglo = '';
			try {
				$strExec = Conexion::prepare($strSql);

				$strExec->bindValue(':clave', $this->clave);
				$strExec->bindValue(':correo', $this->correo);
				$strExec->execute();
				$respuestaArreglo = $strExec->fetchAll();
				$totalrs =count($respuestaArreglo);
				$respuestaArreglo += ['total' => $totalrs];

			} catch (PDOException $e) {
				$errorReturn = ['total' => 0];
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

	public function consultar()
	{
		if (Conexion::getEstatusConexion()) {
			$strSql = 'SELECT cedula, clave, nombre, apellido, direccion, telefono, correo FROM usuario WHERE cedula=:cedula';
			$respuestaArreglo = '';
			try {
				$strExec = Conexion::prepare($strSql);

				$strExec->bindValue(':cedula', $this->cedula);
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
			$strSql = 'SELECT *FROM usuario';
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
						/*
														Consulta  con Like
														El operador LIKE
														Este operador se aplica a datos de tipo cadena y se usa para buscar registros, es capaz de hallar coincidencias dentro de una cadena bajo un patrón dado ejemplo:
														SELECT  cedula, clave, nombre FROM usuario WHERE nombre LIKE ‘%ale%’;
														La instrucción sql anterior retorna todos los nombren que contengan la cedena “ale”
						 */
			$strSql = 'SELECT  id_usuario, cedula, apellido, direccion, telefono, correo, nombre FROM usuario WHERE nombre LIKE :nombre';
			$respuestaArreglo = [];
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
		$strSql = 'UPDATE usuario SET clave=:clave, apellido=:apellido, direccion=:direccion, telefono=:telefono, correo=:correo, nombre=:nombre WHERE cedula=:cedula'; //realizamos una cadena de texto con la instruccion sql a realizar
			$respuestaArreglo = '';  //definimos la variable a retornar los datos de la ejecucion de la instruccion sql
			try {
				$strExec = Conexion::prepare($strSql); // preparamos la sentencia
				//  http://php.net/manual/es/pdo.prepare.php
				$strExec->bindValue(':cedula', $this->cedula); // Vincula un valor a un parámetro
				// http://php.net/manual/es/pdostatement.bindvalue.php
				$strExec->bindValue(':clave', $this->clave);
				$strExec->bindValue(':nombre', $this->nombre);
				$strExec->bindValue(':apellido', $this->apellido);
				$strExec->bindValue(':direccion', $this->direccion);
				$strExec->bindValue(':telefono', $this->telefono);
				$strExec->bindValue(':correo', $this->correo);
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
			$strSql = 'DELETE FROM usuario WHERE cedula=:cedula';
			$respuestaArreglo = '';
			try {
				$strExec = Conexion::prepare($strSql);

				$strExec->bindValue(':cedula', $this->cedula);
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