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
                <a class="nav-link" href="http://www.uptaeb.edu.ve/site/index.php/universidad/vicerrectorado-academico/estudios-avanzados" target="_blank">
                  <span data-feather="shopping-cart"></span>
                  Estudios Avanzados
                </a>
              </li>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../../Controladores/inicio/index-registrar-controlador.php">
                  <span data-feather="file"></span>
                  Registrar 
                </a>
              <li class="nav-item">
                <a class="nav-link" href="../../Controladores/Investigacion/index-investigacion-controlador.php" target="_blank">
                  <span data-feather="users"></span>
                  Investigaciones
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="home"></span>
                  Consultar <span class="sr-only">(current)</span>
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
            <h1 class="h2">Sistema de Gestión de Investigaciones</h1>
          </div>
         <main role="main">



      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">   
                <div class="card-body">
                  <p class="card-text"><b>Consultar Grupo de Investigacion</b><br/>
                  Muestra una tabla con los Grupo registrados en el sistema.</p><br/><br/>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                         <a  class="btn btn-sm btn-primary" href="../../Controladores/GrupodeInvestigacion/consultar-grupo_investigacion-controlador.php">Entrar</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <div class="card-body">
                  <p class="card-text"><b>Consultar Usuarios</b><br/>Muestra una tabla con todos los Usuarios registrados en el sistema.</p><br/><br/>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                       <a  class="btn btn-sm btn-primary" href="../../Controladores/Usuario/consultar-usuario.controlador.php">Entrar</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <div class="card-body">
                  <p class="card-text"><b>Consultar Linea de Investigacion</b><br/>Muestra una tabla con todos los Grupo de Investigacion.</p><br/><br/>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a  class="btn btn-sm btn-primary" href="../../Controladores/Linea_de_Investigacion/consultar-controlador.php">Entrar</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <div class="card-body">
                  <p class="card-text"><b>Consultar Programa</b><br/> Muestra una tabla con todos los Programa Nacional de Formacion de Universidad.</p><br/><br/>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a  class="btn btn-sm btn-primary" href="../../Controladores/Programa/consultar-programa-controlador.php">Entrar</a>  
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <div class="card-body">
                  <p class="card-text"><b>Consultar Macroproyectos</b><br/>Muestra una tabla con todos los Macroproyectos registrados en el Sistema.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a  class="btn btn-sm btn-primary" href="../../Controladores/MacroProyecto/consultar-macroproyecto-controlador.php">Entrar</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <div class="card-body">
                  <p class="card-text"><b>Consultar Comunidades</b><br/>Muestra una tabla con todas las Comunidad.</p><br/><br/><br/>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a  class="btn btn-sm btn-primary" href="../../Controladores/Comunidad/consultar-comunidad-controlador.php">Entrar</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
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
