  <!DOCTYPE html>
<html lang="es">
<style type="text/css">
<!--
.Estilo1 {
	color: #FF3300;
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
  <p>&nbsp;</p>
  <p align="center">* Todos los Datos son Requeridos * </p>
  <section class="col-sm-12">
    <div class="col-sm-4 col-sm-offset-4 col-xs-12 login">
        <div class="col-xs-12 caja">
          <div class="col-xs-12">
            <p align="center"><b>INICIAR SESION</b></p>
          </div>
      </div>
        <form class="form-group" action="?controller=usuario&action=login" method="post">
          <div class="col-xs-12 form-group">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-user"></i></span>
              <input name="nombre" type="text" class="form-control" id="user" maxlength="25" placeholder="Escriba su usuario..." autofocus autocomplete="off" required>
            </div>
          </div>
          <div class="col-xs-12 form-group">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1"><i class="	glyphicon glyphicon-lock"></i></span>
              <input name="clave" type="password" class="form-control" id="user" maxlength="25" placeholder="Escriba su clave..." autofocus autocomplete="off" required>
            </div>
          </div>
          <div class="col-xs-12 form-group">
            <button type="submit" id="logueame" class="btn btn-block btn-info"><i class="glyphicon glyphicon-ok"></i>  Entrar</button>
          </div>
      </form>
	    <div align="center">
	      <span class="Estilo1">
	      <?php 
	  if (isset($_GET['id_m']))
	  {
	  if ($_GET['id_m']==1)
	  {
	  echo "Los datos suministrados son incorrectos";
	  }
	  if ($_GET['id_m']==2)
	  {
	  echo "Debe iniciar sesi&oacute;n para poder acceder este contenido..";
	  }
	  if ($_GET['id_m']==3)
	  {
	  echo "Su sesi&oacute;n fue finalizada exitosamente..";
	  }
	  }
	  ?>
          </span></div>
    </div>
  </section>
  <p align="center" class="Estilo1">&nbsp;</p>
  <p align="center" class="Estilo1">&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</body>
<?php require_once('vista/secciones/footer.php'); ?>
<?php require_once('vista/secciones/scripts.php'); ?>

</html>