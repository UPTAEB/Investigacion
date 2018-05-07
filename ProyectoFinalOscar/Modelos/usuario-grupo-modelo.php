<?php

require_once 'conexion.php'; //incluimos el archivo de php de conexion

// heredamos la clase conexion
class UsuarioGrupo extends Conexion
{
	//definimo los atributos de nuestra clase
	protected $id_usuario_grupo;
	protected $id_usuario;
	protected $id_grupo;
	protected $fecha_afiliacion;

	public function __construct()
	{
		//llamamos  el metodo de crear la conexion previamente definido en la clase Conexion
		Conexion::realizarConexion();
	}

	//realizamos los metodos  set y get  de cada uno de los atributos
	public function setIdUsuarioGrupo($id_usuario_grupo)
	{
		$this->id_usuario_grupo = $id_usuario_grupo;
	}
	public function getIdUsuarioGrupo()
	{
		return $this->id_usuario_grupo;
	}

	public function setIdUsuario($id_usuario)
	{
		$this->id_usuario = $id_usuario;
	}
	public function getIdUsuario()
	{
		return $this->id_usuario;
	}

	public function setIdGrupo($id_grupo)
	{
		$this->id_grupo = $id_grupo;
	}
	public function getIdGrupo()
	{
		return $this->id_grupo;
	}

	public function setFechaAfiliacion($fecha_afiliacion)
	{
		$this->fecha_afiliacion = $fecha_afiliacion;
	}
	public function getFechaAfiliacion()
	{
		return $this->fecha_afiliacion;
	}
	
	//metodos para operar con la base de datos
	public function registrar()
	{
		if (Conexion::getEstatusConexion()) { //verificamos que la conexion esta activa
			$strSql = 'INSERT INTO usuario_grupo (fecha_afiliacion, id_usuario, id_grupo) VALUES (:fecha_afiliacion, :id_usuario, :id_grupo)'; //realizamos una cadena de texto con la instruccion sql a realizar
			$respuestaArreglo = [];  //definimos la variable a retornar los datos de la ejecucion de la instruccion sql
			try {
				$strExec = Conexion::prepare($strSql); // preparamos la sentencia
				//  http://php.net/manual/es/pdo.prepare.php
				$strExec->bindValue(':fecha_afiliacion', $this->fecha_afiliacion); // Vincula un valor a un parámetro
				$strExec->bindValue(':id_usuario', $this->id_usuario);
				$strExec->bindValue(':id_grupo', $this->id_grupo);
				$strExec->execute(); //ejecutamos la instruccion sql
				$respuestaArreglo = $strExec->fetchAll();
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
			$strSql = 'SELECT *FROM usuario_grupo WHERE id_usuario=:id_usuario and id_grupo=:id_grupo';
			$respuestaArreglo = '';
			try {
				$strExec = Conexion::prepare($strSql);

				$strExec->bindValue(':id_usuario', $this->id_usuario);
				$strExec->bindValue(':id_grupo', $this->id_grupo);
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

	public function getMiembros($id_grupo)
	{
		if (Conexion::getEstatusConexion()) {
			$strSql = 'SELECT U.cedula, U.nombre, U.apellido FROM usuario U, usuario_grupo G WHERE U.id_usuario = G.id_usuario and G.id_grupo =:id_grupo';
			$respuestaArreglo = [];
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

	public function consultarNombreUsuario()
	{
		if (Conexion::getEstatusConexion()) {
						
			$strSql = 'SELECT  *FROM usuario_grupo WHERE fecha_afiliacion LIKE :fecha_afiliacion';
			$respuestaArreglo = '';
			try {
				$strExec = Conexion::prepare($strSql);
				$strExec->bindValue(':fecha_afiliacion', "%$this->fecha_afiliacion%");
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
		$strSql = 'UPDATE usuario_grupo SET fecha_afiliacion=:fecha_afiliacion WHERE fecha_afiliacion=:fecha_afiliacion'; //realizamos una cadena de texto con la instruccion sql a realizar
			$respuestaArreglo = '';  //definimos la variable a retornar los datos de la ejecucion de la instruccion sql
			try {
				$strExec = Conexion::prepare($strSql); // preparamos la sentencia
				//  http://php.net/manual/es/pdo.prepare.php
				$strExec->bindValue(':fecha_afiliacion', $this->fecha_afiliacion); // Vincula un valor a un parámetro
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
			$strSql = 'DELETE FROM usuario_grupo WHERE fecha_afiliacion=:fecha_afiliacion';
			$respuestaArreglo = '';
			try {
				$strExec = Conexion::prepare($strSql);

				$strExec->bindValue(':fecha_afiliacion', $this->fecha_afiliacion);
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