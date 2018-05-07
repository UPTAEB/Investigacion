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
    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="../../Controladores/inicio/inicio-controlador.php">
                  <span data-feather="file"></span>
                  Inicio 
                </a>
              </li>
              <li class="nav-item  active">
                <a class="nav-link" href="#">
                  <span data-feather="shopping-cart"></span>
                  Estudios Avanzados
                </a>
              </li>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="home"></span>
                  Registrar <span class="sr-only">(current)</span>
                </a>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="users"></span>
                  Investigaciones
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../../Controladores/inicio/index-consultar-controlador.php">
                  <span data-feather="layers"></span>
                  Consultar
                </a>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>reportes</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Generar Constancias
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Reporte de Usuarios
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Reporte de los Macropoyectos
                </a>
              </li>
            </ul>
          </div>
        </nav>
    <!-- FIN del Panel izquierdo del menu -->
    
    <!-- Parte central de la pagina --> 
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Registro de Nuevo Usuario</h1>
          </div>
         <main role="main">
          <div class="container">
                      <div class="btn-group">
                       <a  class="btn btn-sm btn-primary" href="../../Controladores/inicio/index-registrar-controlador.php">Volver</a>
                    </div>
                  <br/><br/>
<form class="needs-validation" novalidate action="../../Controladores/Usuario/registro-usuario-controlador.php" method="post">
  <div class="form-row">
      <div class="col-md-2 mb-3">
      <label for="validationTooltip05">Cedula</label>
      <input type="text" class="form-control" id="validationTooltip05" name="cedula" placeholder="Cedula" required>
      <div class="invalid-tooltip">
        Please Introduzca Cedula.
      </div>
    </div>
    <div class="col-md-5 mb-3">
      <label for="validationTooltip01">Nombre</label>
      <input type="text" class="form-control" id="validationTooltip01" name="nombre" placeholder="Nombre"  required>
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>
    <div class="col-md-5 mb-3">
      <label for="validationTooltip02">Apellido</label>
      <input type="text" class="form-control" id="validationTooltip02" name="apellido" placeholder="Apellido" required>
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>

  </div>
  <div class="form-row">
    <div class="col-md-8 mb-8">
      <label for="validationTooltip04">Correo</label>
      <div class="input-group">
        <div class="input-group-prepend">
        <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
        </div>
        <input type="email" class="form-control" id="validationTooltipUsername" name="correo" placeholder="Email" aria-describedby="validationTooltipUsernamePrepend" required>
        <div class="invalid-tooltip">
          Please choose a unique and valid Email.
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <label for="validationTooltip03">Contraseña</label>
      <input type="password" class="form-control" id="clave" name="clave" placeholder="Contraseña" required>
      <div class="invalid-tooltip">
        Please Ingrese Contraseña.
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-4">
      <label for="validationTooltip04">Telefono</label>
      <input type="text" class="form-control" id="validationTooltip04" name="telefono" placeholder="Telefono" required>
      <div class="invalid-tooltip">
        Por favor Introduzca un Telefono Valido.
      </div>
    </div>
    <div class="col-md-8 mb-8">
      <label for="validationTooltip03">Direccion</label>
      <input type="text" class="form-control" id="validationTooltip03"  name="direccion" placeholder="Direccion" required>
      <div class="invalid-tooltip">
        Please provide a valid city.
      </div>
    </div>
  </div>
  <div class="form-row">
  <div class="col-md 6 mb-6">
  <center>
     <button class="btn btn-primary" type="submit" name="agregar">Registrar Usuario</button>
        <button type="reset" class="btn btn-danger">Limpiar Campo</button>
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
