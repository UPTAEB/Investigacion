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
    <!-- Parte central de la pagina --> 
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Paso3-Registro de un Nuevo Proyecto</h1>
          </div>
         <main role="main">
          <div class="container">
<form class="needs-validation" novalidate action="../../Controladores/Proyecto/registrar-controlador.php" method="post">
  <div class="form-row">
      <div class="col-md-4 mb-4">
      <label for="validationTooltip05">Titulo</label></center>
      <input type="text" class="form-control" id="validationTooltip05" name="titulo" placeholder="Ingrese su titulo" required>
      <div class="invalid-tooltip">
        Please Introduzca Nombre.
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <label for="validationTooltip01">Comunidad</label>
      <select class="form-control" id="validationTooltip01" id="id_comunidad" name="id_comunidad">
        <option value="0">Seleccione su Comunidad</option>
        <?php 
        foreach ($rsComunidad as $valor){
          if($valor['id_comunidad']!=null) 
             echo '<option value = "'.$valor['id_comunidad'].'">'.$valor['nombre'].'</option>';
        }
        ?>
    </select>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-4">
      <label for="validationTooltip03">Objetivo General</label>
      <input type="text" class="form-control" id="validationTooltip05" name="objetivo_general" placeholder="Objetivo General" required>
      <div class="invalid-tooltip">
        Please Introduzca Nombre.
      </div>
    </div>
      <div class="col-md-4 mb-4">
      <label for="validationTooltip02">Objetivo Estrategico</label>
      <input type="text" class="form-control" id="validationTooltip02" name="objetivo_especifico" placeholder="  Objetivo Especifico" >
    </div>
          <div class="col-md-4 mb-4">
      <label for="validationTooltip02">Linea de Investigacion</label>
      <select class="form-control" id="validationTooltip02" name="id_linea_investigacion">
        <option value="0">Seleccione su Linea de Investigacion </option>
        <?php 
        foreach ($rsLineaInv as $valor){
          if($valor['id_linea_investigacion']!=null) 
             echo '<option value = "'.$valor['id_linea_investigacion'].'">'.$valor['nombre'].'</option>';
        }
        ?>
        </select>
    </div>

    </div>
  </div>
  <div class="form-row">
  <div class="col-md 6 mb-6">
  <center>
     <button class="btn btn-primary" type="submit" name="agregar">Registrar</button>
        <button type="reset" class="btn btn-danger">Limpiar</button>
  </center>
  <hr/>
  </div>
  </div>
</form>
</div>
         </main>
          <center>
  <footer><div id="pie_pagina">Sistema Creado por: Oscar Alejandro Conde Mendoza<br />
     Venezuela-Estado Lara <br />
     Copyright © 2021</div></footer>    
</center>
        </main>
      </div>
    </div>
  </body>
</html>