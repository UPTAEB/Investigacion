<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inicio-Sistema de Gestion Web</title>
    
    <!-- Bootstrap core CSS -->
    <link href="../../recursos/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../recursos/css/dashboard.css" rel="stylesheet">

    <link rel="stylesheet" href="css/album.css">

  </head>

  <body>
    <!-- Parte superior de la pagina --> 
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><img  src="../../recursos/Imagenes/logo uptaeb.png" alt="Logo" width="35" height="35"> UPTAEB</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="../../index.php">Salir</a>
        </li>
      </ul>
    </nav>
    <!-- Panel izquierdo del menu --> 
    
    <!-- FIN del Panel izquierdo del menu -->
    
    <!-- Parte central de la pagina --> 
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Investigacion</h1>
          </div>
                 
        </main>
         <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                       <a  class="btn btn-sm btn-primary" href="../../Controladores/inicio/index-consultar-controlador.php">Volver</a>
                    </div>
                  </div>
                  <br/>
  <div class="table-responsive">
<table class="table table-striped table-sm" border=1>
			<thead>
			<tr>
				<tr>
			<td>Nombre</td>
			<td><?php echo $invNombre ?></td>
				</tr>
				<tr>
				<td>Tipo de Investigacion</td>
				<td><?php echo $invTipo;?></td>	
				</tr>
				<tr>
				<td>Fecha Inicio</td>
				<td><?php echo $invFechaI;?> </td>	
				</tr>
				<tr>
				<td>Fecha Culminacion</td>	
				<td><?php echo $invFechaC ?></td>
				</tr>
			</tr>
			</thead>
		</table>

			<h1>Grupo de Investigacion</h1>
			<hr/>
			<strong>Nombre:</strong><?php echo $NombreGrupo ?>
			<br/>
			<strong>Tutor:</strong> <?php echo $Tutor?>

			<h1>Investigadores</h1>
			<hr/>
			<table class="table table-striped table-sm" border=1>
			<thead>
			<tr>
			<td>Cedula</td>
			<td>Nombre</td>
			<td>Apellido</td>
			</tr>
			</thead>
			<?php foreach ($rsMiembros as $valor) { ?>
				<tr>
			<td><?php echo $valor['cedula'] ?></td>
			<td><?php echo   $valor['nombre'] ?></td>
			<td><?php echo  $valor['apellido'] ?></td>	
				</tr>
			<?php } ?>
		</table>
</div>
<center><a  class="btn btn-sm btn-primary" href="../../Controladores/inicio/inicio-controlador.php">Volver</a></center>
<br/>
          <center>
  <footer><div id="pie_pagina">Sistema Creado por: Oscar Alejandro Conde Mendoza<br />
     Venezuela-Estado Lara <br />
     Copyright © 2021</div></footer>    
</center>
      </div>
    </div>
  </body>
</html>