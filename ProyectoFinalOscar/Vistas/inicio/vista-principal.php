<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <br/> <br/>
            <img src="../../recursos/Imagenes/uptaebanderas.png" class="img-fluid" width=100%
        height="150" alt="Responsive image">
    <title>Inicio-Sistema de Gestion Web</title>
    
    <!-- Bootstrap core CSS -->
    <link href="../../recursos/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../recursos/css/dashboard.css" rel="stylesheet">

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
                <a class="nav-link active" href="#">
                  <span data-feather="home"></span>
                  Inicio <span class="sr-only">(current)</span>
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
                <a class="nav-link" href="#">
                  <span data-feather="users"></span>
                  Investigaciones
                </a>
                <ul>
                <li>
                   <a class="nav-link" href="../../Controladores/Investigacion/index-investigacion-controlador.php" target="_blank">
                    Registrar
                  </a>
                </li>
                 <li>
                    <a class="nav-link" href="../../Controladores/Investigacion/consultar-investigacion-controlador.php">
                    Consultar
                  </a>
                 </li>
                </ul>
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
                <a class="nav-link" href="../../Controladores/Reportes/reporte-usuario-controlador.php" target="_blank">
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
          <p align="justify">
            <img src="../../recursos/Imagenes/estudiosavanzados.png" align="left"><h5 align="justify">El Sistema de Gestión en el Centro de Estudios de Investigación y Desarrollo Territorial de la Universidad Politécnica Territorial Andrés Eloy Blanco de Barquisimeto estado Lara, apoya a la unidad de Estudios Avanzados para el registro de las distintas investigaciones y permite que tanto sus investigadores como tutores puedan seguir el avance de las mismas a través de la web.</h5>
            <hr/>
          </p>
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
