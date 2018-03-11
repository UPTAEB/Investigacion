<?php if (!$_SESSION)
{
$nombre="Iniciar Sesi&oacute;n";
$url="/?action=sesion";
}
else
{
$nombre="Mi Perfil";
$url="/?controller=front&action=perfil&id_action=1";
}
?>


<div class="list-group col-sm-2 lista"> <img src="vista/recursos/usuario/img/avatar.png" width="100%" class="list-group-item">
 <a href="/?controller=front&action=perfil&id_action=1&id_o=1" class="list-group-item <?php if($_GET['id_o']=="1"){ echo "active";} ?>"><i class="glyphicon glyphicon-home"></i> Inicio </a>
  <a href="/?controller=front&action=usuarios&id_o=2&id_action=4&id_usuario=<?php echo $_SESSION['id']; ?>" class="list-group-item <?php if($_GET['id_o']=="2"){ echo "active";} ?>"><i class="glyphicon glyphicon-cog"></i> Mis datos</a>
   <a href="?controller=front&action=grupo_de_investigacion&id_action=1&id_o=3" class="list-group-item <?php if($_GET['id_o']=="3"){ echo "active";} ?>"><i class="glyphicon glyphicon-list-alt"></i> Grupo de Investigaci&oacute;n</a>
    <a href="/?controller=front&action=comunidad&id_action=1&id_o=4" class="list-group-item <?php if($_GET['id_o']=="4"){ echo "active";} ?>"><i class="glyphicon glyphicon-book"></i> Comunidad</a>
	 <a href="/?controller=front&action=perfil&id_action=1&id_o=5" class="list-group-item <?php if($_GET['id_o']=="5"){ echo "active";} ?>"><i class="glyphicon glyphicon-warning-sign"></i> Proyectos</a>
	  <a href="?controller=front&action=metodos&id_action=1&id_o=6" class="list-group-item <?php if($_GET['id_o']=="6"){ echo "active";} ?>"><i class="glyphicon glyphicon-comment"></i> M&eacute;todos</a>
	   <a href="?controller=front&action=macroproyectos&id_action=1&id_o=7" class="list-group-item <?php if($_GET['id_o']=="7"){ echo "active";} ?>"><i class="glyphicon glyphicon-flag"></i> Macroproyectos</a>
	  	<a href="?controller=front&action=programas&id_action=1&id_o=8" class="list-group-item <?php if($_GET['id_o']=="8"){ echo "active";} ?>"><i class="glyphicon glyphicon-cog"></i> Programas</a>
		    <a href="?controller=front&action=resportes&id_action=1&id_o=9" class="list-group-item <?php if($_GET['id_o']=="9"){ echo "active";} ?>"><i class="glyphicon glyphicon-file"></i> Reportes</a>
			<a href="?controller=front&action=noticias&id_action=1&id_o=10" class="list-group-item <?php if($_GET['id_o']=="10"){ echo "active";} ?>"><i class="glyphicon glyphicon-globe"></i> Noticias</a>

	   <a href="?controller=front&action=usuarios&id_action=1&id_o=11" class="list-group-item <?php if($_GET['id_o']=="11"){ echo "active";} ?>"><i class="glyphicon glyphicon-user"></i> Usuarios</a>
	   <a href="/?controller=front&action=roles&id_action=1&id_o=12" class="list-group-item <?php if($_GET['id_o']=="12"){ echo "active";} ?>"><i class="glyphicon glyphicon-tags"></i> Roles</a>
	    <a href="?controller=usuario&action=cerrar_sesion&id_m=3" class="list-group-item"><i class="glyphicon glyphicon-off"></i> Salir</a>		</div>
