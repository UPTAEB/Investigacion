<?php


abstract class Conexion extends PDO
{
	private $host = '127.0.0.1'; //servidor
	private $bd = 'orquidea';  //base de datos
	private $user = 'postgres'; //usuario
	private $password = "12345"; // clave
	private $port = 5432; // puerto
	private $respuestaConexion = false;
	private $errorMensaje = "";
	private $options = [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // mostrar los errores por los try-cath
		PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING, //cambiar los valores null a una cadena vacia
		PDO::ATTR_CASE => PDO::CASE_NATURAL, // escribir el nombre de las tablas como estan definidas
	];

	protected function realizarConexion()
	{
		// http://php.net/manual/es/language.exceptions.php
			parent::__construct("pgsql:host={$this->host} ;dbname={$this->bd} ;port={$this->port}", $this->user, $this->password, $this->options);//ejecutamos la conexion // parent::__construct se utiliza los metodo y atributos de la clase o clases que extendemos/heredamos
		try {
			$this->respuestaConexion = true; //asignamos true al atributo
			$this->errorMensaje = "";
		} catch (PDOException $e) { //entramos si se encuentra un error o exeption
			$this->respuestaConexion = false; //asignamos el valor a false
			$this->errorMensaje = $e; // asignamos el mensaje del error al atributo
		}
   
	}

	protected function getEstatusConexion()
	{//metodo que retorna el estatus de la conexion, lo implementamos en cada metodo que opera con la conexion con la base de datos (INSERT, SELECT, UPDATE, DELETE)
		return $this->respuestaConexion;
	}

	protected function getErrorConexion()
	{ //metodo que nos devuelve el mensaje de error si no llega a darse la conexion
		return $this->errorMensaje;
	}

	protected function cerrarConexion()
	{//metodo implementado para simular el cierre de conexion
		$this->respuestaConexion = false;
	}
}


?>