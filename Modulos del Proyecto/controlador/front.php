<?php 
/**
* FrontController
*/
require_once "modelo/usuario.php";
require_once "modelo/proyectos.php";
require_once "modelo/comunidad.php";
require_once "modelo/macroproyecto.php";
require_once "modelo/grupo_de_investigacion.php";
require_once "modelo/rol.php";
		
class Controlador_Front{

private $obj_usuario;
private $obj_proyecto;
private $obj_comunidad;	
private $obj_macroproyecto;
private $obj_grupo_de_investigacion;
private $obj_rol;

	public function __construct(){

		$this->obj_usuario = new Modelo_Usuario();
		$this->obj_proyecto = new Modelo_Proyecto();
		$this->obj_comunidad = new Modelo_comunidad();
		$this->obj_macroproyecto = new Modelo_macroproyecto();
        $this->obj_grupo_de_investigacion = new Modelo_grupo_de_investigacion();
		$this->obj_rol = new Modelo_rol();
		}
			
	public function home(){
		$titulo_de_la_vista = "Home";
		require_once "vista/principal.php";
	}
	public function proyectos(){
		$titulo_de_la_vista = "Home";
		$comunidades = $this->obj_comunidad->listar();
		$macroproyectos = $this->obj_macroproyecto->listar();
		$proyectos = $this->obj_proyecto->todos();
		$grupo_de_investigacions = $this->obj_grupo_de_investigacion->listar();
		require_once "vista/proyecto.php";

	}
	
	public function grupo_de_investigacion(){
		$titulo_de_la_vista = "Home";
		$usuarios = $this->obj_usuario->listar();
		$grupo_de_investigacions = $this->obj_grupo_de_investigacion->listar();
		require_once "vista/grupo_de_investigacion.php";

	}

	public function contactos(){
		$titulo_de_la_vista = "Contactos";
		require_once "vista/contactos.php";
	}
	
	public function comunidad(){
		$titulo_de_la_vista = "Home";
		$comunidades = $this->obj_comunidad->listar();
		require_once "vista/comunidad.php";

	}
	public function roles(){
		$titulo_de_la_vista = "Home";
		$roles = $this->obj_rol->listar();
		require_once "vista/roles.php";

	}
	
	public function usuarios(){
        $titulo_de_la_vista = "usuarios";
		$usuarios = $this->obj_usuario->listar();
		//$this->obj_usuario->get_id_usuario($_GET['id_usuario']);
		//$usuario_b = $this->obj_usuario->buscar();
		require_once "vista/usuarios.php";
		
	}
	public function perfil(){
        $titulo_de_la_vista = "perfil";
		$proyectos = $this->obj_proyecto->todos();
		require_once "vista/perfil.php";
		
	}

	public function notFound(){
		$titulo_de_la_vista = "Error: 404";
		require_once "vista/404.php";
	}
}
 ?>