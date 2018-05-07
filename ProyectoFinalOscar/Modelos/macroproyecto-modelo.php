<?php 

require_once 'conexion.php';

class Macroproyecto extends Conexion
{
	protected $id_macroproyecto;
	protected $id_programa;
	protected $nombre;
	protected $objetivo_estrategico;
	protected $coordinador;
	protected $estatus;
	protected $id_investigacion;
	
	function __construct()
	{
		Conexion::realizarConexion();
	}

	public function setId_Macroproyecto($id_macroproyecto)
	{
		$this->id_macroproyecto = $id_macroproyecto;
	}
	public function getId_Macroproyecto()
	{
		return $this->id_macroproyecto;
	}

	public function setId_Investigacion($id_investigacion)
	{
		$this->id_investigacion =$id_investigacion;
	}
	public function getId_Investigacion()
	{
		return $this->id_investigacion;
	}

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}
	public function getNombre()
	{
		return $this->nombre;
	}

	public function setObjetivo_estrategico($objetivo_estrategico)
	{
		$this->objetivo_estrategico = $objetivo_estrategico;
	}
	public function getObjetivo_estrategico()
	{
		return $this->objetivo_estrategico;
	}

	public function setCoordinador($coordinador)
	{
		$this->coordinador = $coordinador;
	}
	public function getCoordinador()
	{
		return $this->coordinador;
	}

	public function setEstatus($estatus)
	{
		$this->estatus = $estatus;
	}	
	public function getEstatus()
	{
		return $this->estatus;
	}




public function registrar()
	{
		if (Conexion::getEstatusConexion()) { //verificamos que la conexion esta activa
			$strSql = 'INSERT INTO macroproyecto (nombre, objetivo_estrategico, coordinador, estatus, id_investigacion ) VALUES (:nombre, :objetivo_estrategico, :coordinador, :estatus, :id_investigacion )'; //realizamos una cadena de texto con la instruccion sql a realizar
			$respuestaArreglo = '';  //definimos la variable a retornar los datos de la ejecucion de la instruccion sql
			try {
				$strExec = Conexion::prepare($strSql); // preparamos la sentencia
				//  http://php.net/manual/es/pdo.prepare.php
				$strExec->bindValue(':nombre', $this->nombre); // Vincula un valor a un parámetro
				$strExec->bindValue(':objetivo_estrategico', $this->objetivo_estrategico); // Vincula un valor a un parámetro
				$strExec->bindValue(':coordinador', $this->coordinador); // Vincula un valor a un parámetro
				$strExec->bindValue(':estatus', $this->estatus); // Vincula un valor a un parámetro
				$strExec->bindValue(':id_investigacion', $this->id_investigacion);
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

	public function getLastId()
	{
		if (Conexion::getEstatusConexion()) {
			$strSql = 'SELECT id_macroproyecto FROM macroproyecto ORDER BY id_macroproyecto  DESC LIMIT 1;';
			$respuestaArreglo = [];
			$id = 0;
			try {
				$strExec = Conexion::prepare($strSql);
				$strExec->execute();
				$respuestaArreglo = $strExec->fetchAll();
				foreach ($respuestaArreglo as $valor) {
					$id = $valor['id_macroproyecto'];
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
			$strSql = 'SELECT *FROM macroproyecto';
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

	public function getProyectosAsociados($id_macroproyecto)
	{
		if (Conexion::getEstatusConexion()) {
			$strSql = 'SELECT p.titulo, p.objetivo_general, pr.siglas, c.nombre';
            $strSql.='FROM  proyecto p, programa pr, comunidad c, linea_investigacion l';
			$strSql.='WHERE p.id_linea_investigacion = l.id_linea_investigacion'; 
			$strSql.='AND l.id_programa = pr.id_programa AND p.id_comunidad = c.id_comunidad AND p.id_macroproyecto = $id_macroproyecto';
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


	public function consultar()
	{
		if (Conexion::getEstatusConexion()) {
			$strSql = 'SELECT *FROM macroproyecto WHERE nombre LIKE :nombre';
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

	public function consultar2()
	{
		if (Conexion::getEstatusConexion()) {
			$strSql = 'SELECT *FROM macroproyecto';
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

			$strSql = 'SELECT  id_macroproyecto,objetivo_estrategico, estatus, coordinador, nombre FROM macroproyecto WHERE nombre LIKE :nombre';
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
		$strSql = 'UPDATE macroproyecto SET coordinador=:coordinador, objetivo_estrategico=:objetivo_estrategico, estatus=:estatus WHERE nombre=:nombre'; //realizamos una cadena de texto con la instruccion sql a realizar
			$respuestaArreglo = '';  //definimos la variable a retornar los datos de la ejecucion de la instruccion sql
			try {
				$strExec = Conexion::prepare($strSql); // preparamos la sentencia
				//  http://php.net/manual/es/pdo.prepare.php
				$strExec->bindValue(':nombre', $this->nombre); // Vincula un valor a un parámetro
				// http://php.net/manual/es/pdostatement.bindvalue.php
				$strExec->bindValue(':objetivo_estrategico', $this->objetivo_estrategico);
				$strExec->bindValue(':estatus', $this->estatus);
				$strExec->bindValue(':coordinador', $this->coordinador);
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
			$strSql = 'DELETE FROM macroproyecto WHERE nombre=:nombre';
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
 ?>