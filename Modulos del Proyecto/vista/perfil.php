<?php session_start(); ?>
<?php if (!$_SESSION) header("location:?action=sesion&id_m=2");?>

<!DOCTYPE html>
<html lang="es">
<style type="text/css">
<!--
.Estilo3 {color: #33CC66; font-weight: bold; }
.Estilo4 {font-size: 16px}
.Estilo5 {color: #33CC66; font-weight: bold; font-size: 16px; }
.Estilo6 {
	font-size: 36px;
	font-weight: bold;
}
-->
</style>
<?php require_once('vista/secciones/header.php'); ?>
<body data-spy="scroll">
<?php require_once('vista/secciones/menu.php'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div class="container">
  <div align="right">
    <?php require_once('vista/secciones/menu2.php'); ?>
  </div>
  <span class="Estilo5">
  <section class="col-sm-10"> </section>
  </span> <span class="Estilo4"><strong>
  <section class="col-sm-10"></section>
  </strong>
  <section class="col-sm-10"></section>
  </span> <span class="Estilo4">
  <section class="col-sm-10"></section>
  </span>
  <section class="col-sm-10">
    <div align="center" class="Estilo5">
      <!-- CAJA DONDE ESTA LA TABLA DE GESTION DE LOS INVESTIGADORES -->
    </div>
    <div class="col-sm-12">
      <div align="right"> <span class="Estilo5">
        <?php
  if ($_GET['id_action']==3)
	  {
	  echo "Guardado Exitosamente...";
	  }
	  
  if ($_GET['id_action']==5)
	  {
	  echo "Modificado Exitosamente...";
	  }
	  
	  if ($_GET['id_action']==6)
	  {
	  echo "Eliminado Exitosamente...";
	  }
	  
	  ?>
      </span><span class="Estilo5"> </span><span class="Estilo3"> </span> </div>
      <h2><i class="glyphicon glyphicon-user"></i> Proyectos
        <?php 
		
		
		if ($_GET['id_action']==2)
		{
		echo "-> Ver Proyectos";
		}
		 
		?>
      </h2>
      <hr>
    </div>
    <div class="col-sm-12"> <br>
        <div class="panel panel-default tabla">
          <!-- Default panel contents -->
          <div align="left"><a href="/?controller=front&action=proyectos&id_action=2" class="btn btn-success">Agregar Proyecto </a>
            <?php if ($_GET['id_action']==1 or $_GET['id_action']==3 or $_GET['id_action']==5 or $_GET['id_action']==6)
	  {
	  
	  ?>
          </div>
          <div class="panel-body">
            <p>&nbsp;</p>
            <p>Proyectos Registrados</p>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th width="17"> <div align="center"># </div></th>
                <th width="181"> <div align="center">Titulo </div></th>
                <th width="188"> <div align="center">Objetivo General  </div></th>
                <th colspan="3"> <div align="center">Operaciones </div></th>
              </tr>
            </thead>
            <tbody>
              <?php 
            $numero=1;   
		foreach ($proyectos as $dato):
         if (isset($dato->titulo))
		 		 {
		 ?>
              <tr>
                <td><div align="center"><?php echo $numero; ?></div></td>
                <td><div align="center"><?php echo $dato->titulo; ?></div></td>
                <td><div align="center"><?php echo $dato->objetivo_general; ?></div></td>
                <td width="83"><div align="center"><a href="/?controller=front&action=perfil&id_action=2&id=<?php echo $dato->id; ?>" class="btn btn-info"><i class="glyphicon glyphicon-list-alt"> Ver </i> </a> </div></td>
                <td width="1">&nbsp;</td>
              </tr>
              <?php 
			$numero++;
			}
			else
			{
			echo "Disculpe, no hay registros.";
			}
			endforeach;
			?>
            </tbody>
          </table>
          <p>
            <span class="Estilo6">
            <?php 
	  
	  }
	  
	  if ($_GET['id_action']==2)
	  {
	  foreach ($proyectos as $dato):
	  
	  if ($_GET['id']==$dato->id)
	  {
	  ?>
            </span></p>
          <p class="Estilo6"> <?php echo $dato->titulo;?></p>
          <div>
            <blockquote>
              <p align="justify"><strong>	Resumen: </strong><?php echo $dato->resumen;?></p>
              <p align="justify">&nbsp;</p>
              <p align="justify"><strong>Objetivo General: </strong><?php echo $dato->objetivo_general;?></p>
              <p align="justify"><strong>Objetivos Especificos: </strong><?php echo $dato->objetivo_especifico;?></p>
              <p align="justify">&nbsp;</p>
              <p align="justify"><strong>Comunidad: </strong><?php echo $dato->id_comunidad;?> <a href="#">(Leer M&aacute;s) </a></p>
              <p align="justify"><strong>Grupo de Invetigaci&oacute;n: </strong><?php echo $dato->id_grupo;?> <a href="#">(Leer M&aacute;s) </a></p>
              <p align="justify"><strong>Macroproyecto: </strong><?php echo $dato->id_macroproyecto;?> <a href="#">(Leer M&aacute;s) </a></p>
              <div align="right">
                <table width="200" border="1" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" bgcolor="#FFFFFF">
                  <tr>
                    <td width="93"><div align="center"><a href="?controller=front&action=proyectos&id_action=4&id=<?php echo $dato->id; ?>" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i> </a> Modificar </div></td>
                    <td width="91"><div align="center"><a href="?controller=front&action=proyectos&id_action=7&id=<?php echo $dato->id; ?>&nombre=<?php echo $dato->titulo; ?>" class="btn btn-danger "><i class="glyphicon glyphicon-trash"></i> </a> 
              Eliminar</div></td>
                  </tr>
                              </table>
              </div>
              <p align="right">&nbsp;</p>
            </blockquote>
          </div>
          <p>
            <?php 
			
	  }
		endforeach;
	  }
	  
	  ?>
          </p>
        </div>
    </div>
  </section>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

</body>
<?php require_once('vista/secciones/footer.php'); ?>
<?php require_once('vista/secciones/scripts.php'); ?>

</html>