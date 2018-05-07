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
            <h1 class="h2">Paso2-Registro de un Nuevo MacroProyecto</h1>
          </div>
         <main role="main">
          <div class="container">
<form class="needs-validation" novalidate action="../../Controladores/MacroProyecto/registro-macroproyecto-controlador.php" method="post">
  <div class="form-row">
      <div class="col-md-4 mb-4">
      <label for="validationTooltip05">Nombre</label>
      <input type="text" class="form-control" id="validationTooltip05" name="nombre" placeholder="Nombre" required>
      <div class="invalid-tooltip">
        Please Introduzca Nombre.
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <label for="validationTooltip01">Coordinador</label>
      <input type="text" class="form-control" id="validationTooltip01" name="coordinador" placeholder="Coordinador" required>
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>
  </div>
  <div class="form-row">
      <div class="col-md-4 mb-4">
      <label for="validationTooltip02">Estatus</label>
      <select class="form-control" id="validationTooltip02" name="estatus">
      <option value ="Seleccione">Seleccione</option>
      <option value="Levantando Informacion">Levantando Informacion</option>
      <option value="Recogiendo Requerimientos funcionales">Recogiendo Requerimientos funcionales</option>
    </select>
    </div>
    <div class="col-md-4 mb-4">
      <label for="validationTooltip03">Objetivo Estrategico</label>
       <input type="text" class="form-control" id="validationTooltip05" name="objetivo_estrategico" placeholder="Objetivo Estrategico" required>
      <div class="invalid-tooltip">
        Please Introduzca Nombre.
      </div>
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
