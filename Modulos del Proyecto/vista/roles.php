<?php session_start(); ?>
<?php if (!$_SESSION) header("location:?action=sesion&id_m=2");?>

<!DOCTYPE html>
<html lang="es">
<style type="text/css">
<!--
.Estilo3 {color: #33CC66; font-weight: bold; }
.Estilo4 {font-size: 16px}
.Estilo5 {color: #33CC66; font-weight: bold; font-size: 16px; }
.Estilo6 {font-size: 24px; }
-->
</style>
<?php require_once('vista/secciones/header.php');  

?>
<body data-spy="scroll">
<?php require_once('vista/secciones/menu.php'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align="center">&nbsp;</p>
<div class="container">
  
  <div align="right">
    <?php require_once('vista/secciones/menu2.php'); ?>
    </div>
  <span class="Estilo5">
  <section class="col-sm-10">  </section>
  </span>
  <span class="Estilo4"><strong>
  <section class="col-sm-10"></section>
  </strong>
  <section class="col-sm-10"></section>
  </span>
  <span class="Estilo4">
  <section class="col-sm-10"></section>
  </span>
  <section class="col-sm-10"><div align="center" class="Estilo5">
      <!-- CAJA DONDE ESTA LA TABLA DE GESTION DE LOS INVESTIGADORES -->
    </div>
    <div class="col-sm-12">
      
      <div align="right">
        <span class="Estilo5">
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
      </span><span class="Estilo5">      </span><span class="Estilo3">      </span>            </div>
        <h2><i class="glyphicon glyphicon-user"></i> Roles <?php 
		
		
		if ($_GET['id_action']==2)
		{
		echo "-> Nuevo";
		}
		 
		 if ($_GET['id_action']==4)
		{
		echo "-> Modificar";
		}
		
		if ($_GET['id_action']==7)
		{
		echo "-> Eliminar";
		}
		?>
		
		 </h2>
        <hr>
  </div>
    <div class="col-sm-12">
      <br>
      <div class="panel panel-default tabla">
      <!-- Default panel contents -->
      <div align="left"><a href="?controller=front&action=roles&id_action=2" class="btn btn-success">Agregar Rol </a></div>
      <div class="panel-body">
	  <p>
	    <?php if ($_GET['id_action']==1 or $_GET['id_action']==3 or $_GET['id_action']==5 or $_GET['id_action']==6)
	  {
	  
	  ?>
	  </p>
	  <p>Roles Registrados</p>
      </div>
	  <table class="table">
        <thead>
          <tr>
            <th width="12">
              <div align="center">#            </div></th>
            <th width="174">
              <div align="center">Nombre            </div></th>
            <th width="123">
              <div align="center">C&oacute;digo           </div></th>
            <th colspan="3">
              <div align="center">Operaciones            </div></th>
          </tr>
        </thead>
        <tbody>
		 <?php 
            $numero=1;   
		foreach ($roles as $dato):
         
		 ?>
          <tr>
            <td>
              <div align="center"><?php echo $numero; ?></div></td>
            <td>
              <div align="center"><?php echo $dato->nombre_rol; ?></div></td>
            <td>
              <div align="center"><?php echo $dato->codigo_rol; ?></div></td>
            <td width="2"><div align="center"><a href="?controller=front&action=roles&id_action=4&id=<?php echo $dato->id; ?>" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i> </a> </div></td>
            <td width="82"><div align="center"><a href="?controller=front&action=roles&id_action=7&id=<?php echo $dato->id."&nombre_rol=".$dato->nombre_rol; ?>" class="btn btn-danger "><i class="glyphicon glyphicon-trash"></i> </a> 
              </div></td>
            </tr>
			
			<?php 
			$numero++;
			endforeach;
			?>
        </tbody>
      </table>
      
	  <?php 
	  
	  }
	  if ($_GET['id_action']==2)
	  {
	  ?>
	  <div align="center">
        <p>*Todos los datos son requeridos * </p>
        <form action="?controller=rol&action=registrar_rol" method="post" name="Form1" class="form-group" id="Form1">
          <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-user"></i></span>
                <input name="nombre_rol" type="text" class="form-control" id="nombre_rol" maxlength="25" placeholder="Nombre..." autofocus autocomplete="off" required>
            </div>
          </div>
          <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-font"></i></span>
                <input name="codigo_rol" type="text" class="form-control" id="codigo" maxlength="25" placeholder="Codigo del Rol..." autofocus autocomplete="off" required>
            </div>
          </div>
		  <div class="col-xs-12 form-group">
          <p>&nbsp;</p>
          <table width="276" border="1" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" bgcolor="#FFFFFF">
            <tr>
              <td width="91"><button type="submit" id="logueame" class="btn btn-block btn-info"><i class="glyphicon glyphicon-ok"></i> Guardar </button></td>
              <td width="72">&nbsp;</td>
              <td width="91"><button type="reset" id="logueame" class="btn btn-block btn-warning"><i class="glyphicon glyphicon-ok"></i> Limpiar </button></td>
            </tr>
          </table>
          </form>
        <p>&nbsp;</p>
      </div>
      <p>
        <?php 
	  }
	  if ($_GET['id_action']==4)
	  {
	  foreach ($roles as $dato):
	  if ($_GET['id']==$dato->id)
	  {
	  ?>
    </p>
      <div align="center">
        <p>* Todos los Datos son Requeridos *        </p>
        <form action="?controller=rol&action=modificar_rol" method="post" name="Form1" class="form-group" id="Form1">
          <div class="col-xs-12 form-group">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-user">
              <input name="id" type="hidden" id="id" value="<?php echo $_GET['id']; ?>">
              </i></span>
              <input name="nombre_rol" type="text" class="form-control" id="nombre_rol" value="<?php echo $dato->nombre_rol; ?>" maxlength="25" placeholder="Nombre..." autofocus autocomplete="off" required>
            </div>
          </div>
          <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-font"></i></span>
                <input name="codigo_rol" type="number" class="form-control" id="codigo_rol" value="<?php echo $dato->codigo_rol; ?>" maxlength="25" placeholder="Codigo del Rol..." autofocus autocomplete="off" required>
            </div>
          </div>
          <div class="col-xs-12 form-group">
          <p>&nbsp;</p>
          <table width="276" border="1" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" bgcolor="#FFFFFF">
            <tr>
              <td width="91"><button type="submit" id="logueame" class="btn btn-block btn-info"><i class="glyphicon glyphicon-ok"></i>Modificar</button></td>
              <td width="72">&nbsp;</td>
              <td width="91"><button type="reset" id="logueame" class="btn btn-block btn-warning"><i class="glyphicon glyphicon-ok"></i> Limpiar </button></td>
            </tr>
          </table>
        </form>
        <p>&nbsp;</p>
      </div>
      <p>    
        <?php 
		
		}
		endforeach;
	  }
	  if ($_GET['id_action']==7)
		{

	?>
      </p>
      <form name="form1" method="post" action="?controller=rol&action=eliminar_rol">
        <p class="Estilo6">&nbsp;</p>
        <p class="Estilo6">&iquest;Desea eliminar la informaci&oacute;n del rol,
          <input name="id" type="hidden" id="id" value="<?php echo $_GET['id']; ?>">
            <?php echo $_GET['nombre_rol']; ?>?, la misma no podra ser recuperada</p>
        <table width="250" border="1" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" bgcolor="#FFFFFF">
          <tr>
            <td width="240"><button type="submit" id="logueame" class="btn btn-block btn-info"><i class="glyphicon glyphicon-ok"></i>&iexcl;Si, Deseo Eliminar Rol! </button></td>
            </tr>
        </table>
        <p class="Estilo6">
          <?php
		}
	  ?>
        </p>
      </form>
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