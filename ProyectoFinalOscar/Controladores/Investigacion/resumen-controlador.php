<?php 
require_once '../../Modelos/investigaciones-modelos.php';
$investigacion= new Investigaciones();
$id_Investigacion= $investigacion->getLastId2();
$rsInvestigacion= $investigacion->getById($id_Investigacion);
$invNombre="";
$invTipo="";
$invFechaI="";
$invFechaC="";
$id_grupo=0;
$NombreGrupo=NULL;
$Tutor=NULL;
		$invNombre=$rsInvestigacion[0][3];
		$invTipo=$rsInvestigacion[0][2];
		$invFechaI=$rsInvestigacion[0][4];
		$invFechaC=$rsInvestigacion[0][5];
		$id_grupo=$rsInvestigacion[0][1];



require_once '../../Modelos/grupo-investigacion-modelo.php';
$grupoinv= new GrupoInv();
$rsGrupo= $grupoinv->getById($id_grupo);
$NombreGrupo=$rsGrupo[0][4];
$Tutor=$rsGrupo[0][6];

require_once '../../Modelos/usuario-grupo-modelo.php';
$grupousu= new UsuarioGrupo();
$rsMiembros= $grupousu->getMiembros($id_grupo);

require_once '../../Vistas/Investigaciones/resumen-vista.php';
 ?>