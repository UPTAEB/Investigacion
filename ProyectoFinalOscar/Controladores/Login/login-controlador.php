<?php 
if (!empty($_POST))
	if (isset($_POST["correo"])) {
      require_once '../../Modelos/usuario-modelo.php';
session_start();
$usuario= new Usuario();
$usuario->setCorreo(addslashes($_POST["correo"]));
$usuario->setClave(addslashes($_POST["clave"]));
$rsUsuario=$usuario->ExisteUsuario();
if ($rsUsuario['total']>0) {
	$_SESSION['correo'] = addslashes($_POST["correo"]);
    $_SESSION['clave'] = addslashes($_POST["clave"]);
	require_once '../inicio/inicio-controlador.php';
}else{
	require_once '../../Vistas/Login/mensaje-error-vista.php';
}

}
 ?>