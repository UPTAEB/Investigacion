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
        <h2><i class="glyphicon glyphicon-user"></i> Proyecto <?php 
		
		
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
      <div align="left"><a href="/?controller=front&action=proyectos&id_action=2" class="btn btn-success">Agregar Proyecto </a></div>
      <div class="panel-body">
	  <p>
	    <?php if ($_GET['id_action']==1 or $_GET['id_action']==3 or $_GET['id_action']==5 or $_GET['id_action']==6)
	  {
	  
	  ?>
	  </p>
	  
      </div>
	  <table class="table">
        <thead>
          <tr>
            <th width="12">
              <div align="center">#            </div></th>
            <th width="174">
              <div align="center">Nombre            </div></th>
            <th width="123">
              <div align="center">Correo            </div></th>
            <th width="99"><div align="center">Rol</div></th>
            <th colspan="3">
              <div align="center">Operaciones            </div></th>
          </tr>
        </thead>
        <tbody>
		 <?php 
            $numero=1;   
		foreach ($usuarios as $dato):
         
		 ?>
          <tr>
            <td>
              <div align="center"><?php echo $numero; ?></div></td>
            <td>
              <div align="center"><?php echo $dato->nombre."  ".$dato->apellido; ?></div></td>
            <td>
              <div align="center"><?php echo $dato->correo; ?></div></td>
            <td>			  <div align="center"><?php echo $dato->rol; ?></div></td>
            <td width="2"><div align="center"><a href="?controller=front&action=usuarios&id_action=4&id_usuario=<?php echo $dato->id_usuario; ?>" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i> </a> </div></td>
            <td width="82"><div align="center"><a href="?controller=front&action=usuarios&id_action=7&id_usuario=<?php echo $dato->id_usuario."&nombre=".$dato->nombre."&apellido=".$dato->apellido; ?>" class="btn btn-danger "><i class="glyphicon glyphicon-trash"></i> </a> 
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
        <form action="?controller=proyecto&action=registrar_Proyectos" method="post" name="Form1" class="form-group" id="Form1">
		<div class="col-xs-12 form-group">
          <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
              <input name="titulo" type="text" class="form-control" id="titulo2" maxlength="25" placeholder="Titulo..." autofocus autocomplete="off" required>
          </div>
		  </div>
		<div class="col-xs-12 form-group">
          <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-globe"></i></span>
              <textarea name="objetivo_general" rows="4" class="form-control" id="user" placeholder="Objetivo General..." autocomplete="off" required="required"></textarea>
          </div>
		  </div>
		<div class="col-xs-12 form-group">
          <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-globe"></i></span>
              <textarea name="objetivo_especifico" rows="4" class="form-control" id="objetivo_especifico" placeholder="Objetivo Especifico..." autofocus="autofocus" autocomplete="off" required="required"></textarea>
          </div>
		  </div>
		<div class="col-xs-12 form-group">
          <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-globe"></i></span>
              <textarea name="resumen" rows="4" class="form-control" id="resumen" placeholder="Resumen..." autocomplete="off" required="required"></textarea>
          </div>
		  </div>
		<p>&nbsp;</p>
          <div class="col-xs-12 form-group"><div class="input-group">
            <p>Comunidad:
                <select name="id_comunidad" id="id_comunidad">
				<?php foreach ($comunidades as $dato): ?>
                  <option value="<?php echo $dato->id_comunidad; ?>" ><?php echo $dato->nombre; ?></option>
				  <?php endforeach; ?>
                  </select>
              </p>
            </div>
          </div>
          <div class="col-xs-12 form-group">
            <div class="input-group">
              <p>&nbsp;</p>
              <p>Macroproyecto:
                <select name="id_macroproyecto" id="id_macroproyecto">
				<?php foreach ($macroproyectos as $dato): ?>
                  <option value="<?php echo $dato->id; ?>"><?php echo $dato->nombre; ?></option>
				  <?php endforeach; ?>
                  </select>
              </p>
            </div>
          </div>
          <div class="col-xs-12 form-group">
            <div class="input-group">
              <p>&nbsp;</p>
              <p>Grupo de Investigaci&oacute;n :
                <select name="id_grupo">
				<?php foreach ($grupo_de_investigacions as $dato): ?>
                  <option value="<?php echo $dato->id_grupo; ?>"><?php echo $dato->nombre; ?></option>
				  <?php endforeach; ?>
                  </select>
              </p>
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
          </form>
        <p>&nbsp;</p>
      </div>
      <p>
        <?php 
	  }
	  if ($_GET['id_action']==4)
	  {
	  foreach ($proyectos as $dato):
	  if ($_GET['id']==$dato->id)
	  {
	  ?>
    </p>
      <div align="center">
        <p>*Todos los datos son requeridos * </p>
        <form action="?controller=proyecto&action=modificar_proyecto" method="post" name="Form1" class="form-group" id="Form1">
          <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-envelope">
              <input name="id" type="hidden" id="id" value="<?php echo $_GET['id']; ?>">
            </i></span>
                <input name="titulo" type="text" class="form-control" id="titulo" value="<?php echo $dato->titulo; ?>" maxlength="25" placeholder="Titulo..." autofocus autocomplete="off" required>
            </div>
          </div>
          <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-globe"></i></span>
                <textarea name="objetivo_general" rows="4" class="form-control" id="objetivo_general" placeholder="Objetivo General..." autocomplete="off" required="required"><?php echo $dato->objetivo_general; ?></textarea>
            </div>
          </div>
          <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-globe"></i></span>
                <textarea name="objetivo_especifico" rows="4" class="form-control" id="textarea2" placeholder="Objetivo Especifico..." autofocus="autofocus" autocomplete="off" required="required"><?php echo $dato->objetivo_especifico; ?></textarea>
            </div>
          </div>
          <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-globe"></i></span>
                <textarea name="resumen" rows="4" class="form-control" id="textarea3" placeholder="Resumen..." autocomplete="off" required="required"><?php echo $dato->resumen; ?></textarea>
            </div>
          </div>
          <p>&nbsp;</p>
          <div class="col-xs-12 form-group">
            <div class="input-group">
              <p>Comunidad:
                <select name="id_comunidad" id="id_comunidad">
                    <?php foreach ($comunidades as $dato1): ?>
                    <option value="<?php echo $dato1->id_comunidad; ?>"<?php if ($dato1->id_comunidad == $dato->id_comunidad ) { echo "selected=\"selected\"";} ?>><?php echo $dato1->nombre; ?></option>
                    <?php endforeach; ?>
                  </select>
              </p>
            </div>
          </div>
          <div class="col-xs-12 form-group">
            <div class="input-group">
              <p>&nbsp;</p>
              <p>Macroproyecto:
                <select name="id_macroproyecto" id="select2">
                    <?php foreach ($macroproyectos as $dato2): ?>
                    <option value="<?php echo $dato2->id; ?>"<?php if ($dato2->id == $dato->id ) { echo "selected=\"selected\"";} ?>><?php echo $dato2->nombre; ?></option>
                    <?php endforeach; ?>
                  </select>
              </p>
            </div>
          </div>
          <div class="col-xs-12 form-group">
            <div class="input-group">
              <p>&nbsp;</p>
              <p>Grupo de Investigaci&oacute;n :
                <select name="id_grupo" id="id_grupo">
                    <?php foreach ($grupo_de_investigacions as $dato3): ?>
                    <option value="<?php echo $dato3->id_grupo; ?>"<?php if ($dato3->id_grupo == $dato->id_grupo ) { echo "selected=\"selected\"";} ?>><?php echo $dato3->nombre; ?></option>
                    <?php endforeach; ?>
                  </select>
              </p>
            </div>
          </div>
          <div class="col-xs-12 form-group">
		  <table width="276" border="1" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" bgcolor="#FFFFFF">
          <tr>
            <td width="91"><button type="submit" id="logueame" class="btn btn-block btn-info"><i class="glyphicon glyphicon-ok"></i> Modificar </button></td>
            <td width="72">&nbsp;</td>
            <td width="91"><button type="reset" id="logueame" class="btn btn-block btn-warning"><i class="glyphicon glyphicon-ok"></i> Limpiar </button></td>
          </tr>
        </table>
        </form>
        
        </div>
      <p>&nbsp;</p>
      <p>    
        <?php 
		
		}
		endforeach;
	  }
	  if ($_GET['id_action']==7)
		{

	?>
      </p>
      <form name="form1" method="post" action="?controller=proyecto&action=eliminar_proyecto">
        <p class="Estilo6">&nbsp;</p>
        <p class="Estilo6">&iquest;Desea eliminar el proyecto titulado
          <input name="id" type="hidden" id="id" value="<?php echo $_GET['id']; ?>">
          <strong><?php echo $_GET['nombre']; ?></strong>?, el mismo no podra ser recuperado.</p>
        <table width="250" border="1" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" bgcolor="#FFFFFF">
          <tr>
            <td width="240"><button type="submit" id="logueame" class="btn btn-block btn-info"><i class="glyphicon glyphicon-ok"></i>&iexcl;Si, Deseo Eliminar Proyecto! </button></td>
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