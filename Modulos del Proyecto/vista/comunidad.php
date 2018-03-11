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
        <h2><i class="glyphicon glyphicon-user"></i> Comunidad <?php 
		
		
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
      <div align="left"><a href="?controller=front&action=comunidad&id_action=2" class="btn btn-success">Agregar Comunidad </a></div>
      <div class="panel-body">
	  <p>
	    <?php if ($_GET['id_action']==1 or $_GET['id_action']==3 or $_GET['id_action']==5 or $_GET['id_action']==6)
	  {
	  
	  ?>
	  </p>
	  <p>Comunidades Registradas</p>
      </div>
	  <table class="table">
        <thead>
          <tr>
            <th width="17">
              <div align="center">#            </div></th>
            <th width="174">
              <div align="center">Nombre            </div></th>
            <th width="83">
              <div align="center">Rif            </div></th>
            <th colspan="3"><div align="center">Operaciones            </div></th>
          </tr>
        </thead>
        <tbody>
		 <?php 
            $numero=1;   
		foreach ($comunidades as $dato):
         
		 ?>
          <tr>
            <td>
              <div align="center"><?php echo $numero; ?></div></td>
            <td>
              <div align="center"><?php echo $dato->nombre; ?></div></td>
            <td>
              <div align="center"><?php echo $dato->rif; ?></div></td>
            <td width="37"><div align="center"><a href="?controller=front&action=comunidad&id_action=4&id_comunidad=<?php echo $dato->id_comunidad; ?>" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i> </a> </div></td>
            <td width="34"><div align="center"><a href="?controller=front&action=comunidad&id_action=7&id_comunidad=<?php echo $dato->id_comunidad."&nombre=".$dato->nombre; ?>" class="btn btn-danger "><i class="glyphicon glyphicon-trash"></i> </a> 
              </div></td>
			  <td width="34"><div align="center"><a href="?controller=front&action=comunidad&id_action=10&id_comunidad=<?php echo $dato->id_comunidad; ?>" class="btn btn-info "><i class="glyphicon glyphicon-list-alt"></i> </a> 
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
        <form action="?controller=comunidad&action=registrar_comunidad" method="post" name="Form1" class="form-group" id="Form1">
		<div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-credit-card"></i></span>
                <input name="nombre" type="text" class="form-control" id="nombre" maxlength="25" placeholder="Nombre..." autofocus autocomplete="off" required>
            </div>
          </div>
		  <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-user"></i></span>
                <input name="rif" type="text" class="form-control" id="Rif" maxlength="25" placeholder="Rif..." autofocus autocomplete="off" required>
            </div>
          </div>
          <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-font"></i></span>
                <input name="estado" type="text" class="form-control" id="estado" maxlength="25" placeholder="Estado..." autofocus autocomplete="off" required>
            </div>
          </div>
		  <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-phone"></i></span>
                <input name="parroquia" type="text" class="form-control" id="user" maxlength="25" placeholder="Parroquia.." autofocus autocomplete="off" required>
            </div>
          </div>
		  <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
                <input name="municipio" type="text" class="form-control" id="user" maxlength="25" placeholder="Municipio..." autofocus autocomplete="off" required>
            </div>
          </div>
		  <div class="col-xs-12 form-group">
		   <table width="276" border="1" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" bgcolor="#FFFFFF">
             <tr>
               <td width="91"><button type="submit" id="logueame" class="btn btn-block btn-info"><i class="glyphicon glyphicon-ok"></i> Guardar </button></td>
               <td width="72">&nbsp;</td>
               <td width="91"><button type="reset" id="logueame" class="btn btn-block btn-warning"><i class="glyphicon glyphicon-ok"></i> Limpiar </button></td>
             </tr>
           </table>
		   <p>&nbsp;</p>
        </form>
        <p>&nbsp;</p>
      </div>
      <p>
        <?php 
	  }
	  if ($_GET['id_action']==4)
	  {
	  foreach ($comunidades as $dato):
	  if ($_GET['id_comunidad']==$dato->id_comunidad)
	  {
	  ?>
    </p>
      <div align="center">
        <p>*Todos los datos son requeridos * </p>
        <form action="?controller=comunidad&action=modificar_comunidad" method="post" name="Form1" class="form-group" id="Form1">
          <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-credit-card">
              <input name="id_comunidad" type="hidden" id="id_comunidad" value="<?php echo $_GET['id_comunidad']; ?>">
            </i></span>
                <input name="nombre" type="text" class="form-control" id="nombre" value="<?php echo $dato->nombre; ?>" maxlength="25" placeholder="Nombre..." autofocus autocomplete="off" required>
            </div>
          </div>
          <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-user"></i></span>
                <input name="rif" type="text" class="form-control" id="rif" value="<?php echo $dato->rif; ?>" maxlength="25" placeholder="Rif..." autofocus autocomplete="off" required>
            </div>
          </div>
          <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-font"></i></span>
                <input name="estado" type="text" class="form-control" id="estado" value="<?php echo $dato->estado; ?>" maxlength="25" placeholder="Estado..." autofocus autocomplete="off" required>
            </div>
          </div>
          <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-phone"></i></span>
                <input name="parroquia" type="text" class="form-control" id="parroquia" value="<?php echo $dato->parroquia; ?> " maxlength="25" placeholder="Parroquia.." autofocus autocomplete="off" required>
            </div>
          </div>
          <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
                <input name="municipio" type="text" class="form-control" id="parroquia" value="<?php echo $dato->municipio; ?>" maxlength="25" placeholder="Municipio..." autofocus autocomplete="off" required>
            </div>
          </div>
          <div class="col-xs-12 form-group">
          <table width="276" border="1" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" bgcolor="#FFFFFF">
            <tr>
              <td width="91"><button type="submit" id="logueame" class="btn btn-block btn-info"><i class="glyphicon glyphicon-ok"></i> Guardar </button></td>
              <td width="72">&nbsp;</td>
              <td width="91"><button type="reset" id="logueame" class="btn btn-block btn-warning"><i class="glyphicon glyphicon-ok"></i> Limpiar </button></td>
            </tr>
          </table>
          <p>&nbsp;</p>
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
      <form name="form1" method="post" action="?controller=comunidad&action=eliminar_comunidad">
        <p class="Estilo6">&nbsp;</p>
        <p class="Estilo6">&iquest;Desea eliminar la informaci&oacute;n de la comunidad
          <input name="id_comunidad" type="hidden" id="id_comunidad" value="<?php echo $_GET['id_comunidad']; ?>">
          <strong><?php echo $_GET['nombre']; ?></strong>?, la misma no podra ser recuperada</p>
        <table width="250" border="1" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" bgcolor="#FFFFFF">
          <tr>
            <td width="240"><button type="submit" id="logueame" class="btn btn-block btn-info"><i class="glyphicon glyphicon-ok"></i>&iexcl;Si, Deseo Eliminar Comunidad! </button></td>
            </tr>
        </table>
        <p class="Estilo6">
          <?php
		}
	  ?>
        </p>
      </form>
      <?php 
	  
	  if ($_GET['id_action']==10)
	  {
	  foreach ($comunidades as $dato):
	  
	  if ($_GET['id_comunidad']==$dato->id_comunidad)
	  {
	?>
	  <p align="justify"><strong>Nombre: </strong><?php echo $dato->nombre;?></p>
	  <p align="justify"><strong>Rif:</strong><?php echo $dato->rif;?></p>
	  <p align="justify"><strong>Estado: </strong><?php echo $dato->estado;?></p>
	  <p align="justify"><strong>Parroquia: </strong><?php echo $dato->parroquia;?> <a href="#"></a></p>
	  <p align="justify"><strong>Municipio: </strong><?php echo $dato->municipio;?> <a href="#"></a><a href="#"> </a></p>
	  <div align="right">
        <table width="184" border="1" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" bgcolor="#FFFFFF">
          <tr>
            <td width="93"><div align="center"><a href="?controller=front&action=comunidad&id_action=4&id_comunidad=<?php echo $dato->id_comunidad; ?>" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i> </a> Modificar </div></td>
            <td width="91"><div align="center"><a href="?controller=front&action=comunidad&id_action=7&id_comunidad=<?php echo $dato->id_comunidad; ?>&nombre=<?php echo $dato->nombre; ?>" class="btn btn-danger "><i class="glyphicon glyphicon-trash"></i> </a> Eliminar</div></td>
          </tr>
        </table>
	    </div>
	  <p>&nbsp;</p>
      <p>&nbsp;</p>
	  <?php
	  }
	  
	  endforeach;
	  }
	    ?>
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