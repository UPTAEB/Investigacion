<?php 

if(empty($_REQUEST)) {
    require_once "controlador/front.php";
    $controlador=new Controlador_Front();
    $controlador->home();

}
if (isset($_GET['action']))
{
if($_GET['action'] == 'sesion') {
    require_once "controlador/usuario.php";
    $controlador=new Controlador_usuario();
    $controlador->sesion();

}
if($_GET['action'] == 'contactos') {
    require_once "controlador/front.php";
    $controlador=new Controlador_Front();
    $controlador->contactos();

}

if($_GET['action'] == 'info') {
    require_once "vista/quien_somos.php";

}



}


if (isset($_REQUEST['controller']) && isset($_REQUEST['action'])){

    if($_GET['action'] == 'contactos') {
    require_once "controlador/front.php";
    $controlador=new Controlador_Front();
    $controlador->contactos();

}



    $controlador = strtolower($_REQUEST['controller']);
    $accion = strtolower($_REQUEST['action']);
    
    //revisamos si el archivo con el nombre del controlador existe dentro de la carpeta controlador

    if (file_exists("controlador/$controlador.php")) {
        
        //cargamos el archivo
        require_once "controlador/$controlador.php";
        //ponemos Controlador_ porque todos los controladores comienzan de esa manera
        $controlador = "Controlador_".ucwords($controlador);
        //creamos el objeto controlador
        $obj_controlador = new $controlador();
            //si existe la accion como un metodo dentro de la clase la ejecutamos
            if (method_exists($obj_controlador, $accion)) {
                $obj_controlador->$accion();
            }else{
                //si la accion no existe cargamos la pagina 404
                header("location: ?controller=front&action=notFound");
            }
    }else{

        //si el archivo controlador no existe dentro de la carpeta cargamos la pagina 404
        header("location: ?controller=front&action=notFound");
    }
}

?>



