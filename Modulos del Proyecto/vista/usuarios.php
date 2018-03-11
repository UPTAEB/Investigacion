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
        <h2><i class="glyphicon glyphicon-user"></i> Usuarios <?php 
		
		
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
      <div align="left"><a href="?controller=front&action=usuarios&id_action=2" class="btn btn-success">Agregar Usuario </a></div>
      <div class="panel-body">
	  <p>
	    <?php if ($_GET['id_action']==1 or $_GET['id_action']==3 or $_GET['id_action']==5 or $_GET['id_action']==6)
	  {
	  
	  ?>
	  </p>
	  <p>Usuarios Registrados</p>
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
        <form action="?controller=usuario&action=registrar_usuario" method="post" name="Form1" class="form-group" id="Form1">
		<div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-credit-card"></i></span>
                <input name="cedula" type="text" class="form-control" id="nombre" maxlength="25" placeholder="C&eacute;dula..." autofocus autocomplete="off" required>
            </div>
          </div>
		  <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-user"></i></span>
                <input name="nombre" type="text" class="form-control" id="cedula" maxlength="25" placeholder="Nombres..." autofocus autocomplete="off" required>
            </div>
          </div>
          <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-font"></i></span>
                <input name="apellido" type="text" class="form-control" id="user" maxlength="25" placeholder="Apellidos..." autofocus autocomplete="off" required>
            </div>
          </div>
		  <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-phone"></i></span>
                <input name="telefono" type="number" class="form-control" id="user" maxlength="25" placeholder="Telefono.." autofocus autocomplete="off" required>
            </div>
          </div>
		  <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
                <input name="correo" type="text" class="form-control" id="user" maxlength="25" placeholder="Correo..." autofocus autocomplete="off" required>
            </div>
          </div>
		  <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-globe"></i></span>
                <textarea name="direccion" rows="4" class="form-control" id="user" placeholder="Direccion..." autofocus="autofocus" autocomplete="off" required="required"></textarea>
            </div>
          </div>
          <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="	glyphicon glyphicon-certificate"></i></span>
                <input name="clave" type="password" class="form-control" id="user" maxlength="25" placeholder="Escriba su clave..." autofocus autocomplete="off" required>
            </div>
          </div>
		  <div class="col-xs-12 form-group">
		  <div class="col-xs-12 form-group">
            <div class="input-group"> 
              <p>&nbsp;</p>
              <p>Rol: 
                <select name="rol">
                  <option value="1">ADMINISTRADOR</option>
                  <option value="2">INVESTIGADOR</option>
                  <option value="3">COMUNIDAD</option>
                </select>
              </p>
              </div>
          </div>
          <div class="col-xs-12 form-group">
            <div class="input-group">
              <p>Sexo: 
                <select name="sexo" class="form-control">
                  <option value="1">Masculino</option>
                  <option value="2">Femenino</option>
                </select>
              </p>
              <p>&nbsp;</p>
            </div>
            <button type="submit" id="logueame" class="btn btn-block btn-info"><i class="glyphicon glyphicon-ok"></i> Entrar</button>
          </div>
        </form>
        <p>&nbsp;</p>
      </div>
      <p>
        <?php 
	  }
	  if ($_GET['id_action']==4)
	  {
	  foreach ($usuarios as $dato):
	  if ($_GET['id_usuario']==$dato->id_usuario)
	  {
	  ?>
    </p>
      <div align="center">
        <p>* Todos los Datos son Requeridos *        </p>
        <form action="?controller=usuario&action=modificar_usuario" method="post" name="Form2" class="form-group" id="Form2">
          <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-credit-card">
              <input name="id_usuario" type="hidden" id="id_usuario" value="<?php echo $dato->id_usuario; ?>">
            </i></span>
                <input name="cedula" type="number" class="form-control" id="cedula" maxlength="25" placeholder="C&eacute;dula..." autofocus autocomplete="off" required value="<?php echo $dato->cedula; ?>">
            </div>
          </div>
          <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-user"></i></span>
                <input name="nombre" type="text" class="form-control" id="nombre" value="<?php echo $dato->nombre; ?>" maxlength="25" placeholder="Nombres..." autofocus autocomplete="off" required>
            </div>
          </div>
          <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-font"></i></span>
                <input name="apellido" type="text" class="form-control" id="apellido" value="<?php echo $dato->apellido; ?>" maxlength="25" placeholder="Apellidos..." autofocus autocomplete="off" required>
            </div>
          </div>
          <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-phone"></i></span>
                <input name="telefono" type="number" class="form-control" id="apellido" value="<?php echo $dato->telefono; ?>" maxlength="25" placeholder="Telefono.." autofocus autocomplete="off" required>
            </div>
          </div>
          <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
                <input name="correo" type="email" class="form-control" id="apellido" value="<?php echo $dato->correo; ?>" maxlength="50" placeholder="Correo..." autofocus autocomplete="off" required>
            </div>
          </div>
          <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-globe"></i></span>
                <textarea name="direccion" rows="4" class="form-control" id="apellido" placeholder="Direccion..." autofocus="autofocus" autocomplete="off" required="required"><?php echo $dato->direccion; ?></textarea>
            </div>
          </div>
          <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="	glyphicon glyphicon-certificate"></i></span>
                <input name="clave" type="password" class="form-control" id="apellido" maxlength="25" placeholder="Escriba su clave..." autofocus autocomplete="off" required>
            </div>
          </div>
          <div class="col-xs-12 form-group">
          <div class="col-xs-12 form-group">
            <div class="input-group">
              <p>&nbsp;</p>
              <p>Rol:
			  <?php if ($_SESSION['id_rol']==1)
			  {
			  ?>
                <select name="rol" id="rol">
                  <option value="1" selected <?php if (!(strcmp(1, $dato->rol))) {echo "selected=\"selected\"";} ?>>ADMINISTRADOR</option>
                  <option value="2" <?php if (!(strcmp(2, $dato->rol))) {echo "selected=\"selected\"";} ?>>INVESTIGADOR</option>
                  <option value="3" <?php if (!(strcmp(3, $dato->rol))) {echo "selected=\"selected\"";} ?>>COMUNIDAD</option>
                  </select>
				  <?php
				  }
				  else
				  {

				  ?>
				  <select name="rol" id="rol">
                  <option value="2" <?php if (!(strcmp(2, $dato->rol))) {echo "selected=\"selected\"";} ?>>INVESTIGADOR</option>
                  <option value="3" <?php if (!(strcmp(3, $dato->rol))) {echo "selected=\"selected\"";} ?>>COMUNIDAD</option>
                  </select>  
				   <?php
				  }
				  ?>
			    </p>
              </div>
          </div>
          <div class="col-xs-12 form-group">
            <div class="input-group">
              <p>Sexo:
			  <?php if ($dato->sexo==1)
			  {
			  ?>
                <select name="sexo" class="form-control" id="sexo">
                    <option value="1" selected>Masculino</option>
                    <option value="2">Femenino</option>
                  </select>
              
			  <?php
			  }
			  else
			  {
			  ?>
			  <select name="sexo" class="form-control" id="sexo">
                    <option value="1">Masculino</option>
                    <option value="2" selected>Femenino</option>
                  </select>
				  <?php
			  }
			  ?>
			  </p>
              <p>&nbsp;</p>
            </div>
             
            <table width="276" border="1" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" bgcolor="#FFFFFF">
              <tr>
                <td width="91"><button type="submit" id="logueame" class="btn btn-block btn-info"><i class="glyphicon glyphicon-ok"></i> Modificar </button></td>
                <td width="72">&nbsp;</td>
                <td width="91"><button type="reset" id="logueame" class="btn btn-block btn-warning"><i class="glyphicon glyphicon-ok"></i> Limpiar </button></td>
              </tr>
            </table>
            <p>&nbsp;</p>
          </div>
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
      <form name="form1" method="post" action="?controller=usuario&action=eliminar_usuario">
        <p class="Estilo6">&nbsp;</p>
        <p class="Estilo6">&iquest;Desea eliminar la informaci&oacute;n del usuario
          <input name="id_usuario" type="hidden" id="id_usuario" value="<?php echo $_GET['id_usuario']; ?>">
            <?php echo $_GET['nombre']." ".$_GET['apellido']; ?>?, la misma no podra ser recuperada</p>
        <table width="250" border="1" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" bgcolor="#FFFFFF">
          <tr>
            <td width="240"><button type="submit" id="logueame" class="btn btn-block btn-info"><i class="glyphicon glyphicon-ok"></i>&iexcl;Si, Deseo Eliminar Usuario! </button></td>
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