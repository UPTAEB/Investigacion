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
            <h1 class="h2">Lineas de Investigacion</h1>
          </div>
                 
        </main>
         <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                       <a  class="btn btn-sm btn-primary" href="../../Controladores/inicio/index-consultar-controlador.php">Volver</a>
                    </div>
                  </div>
                  <br/>
  <div class="table-responsive">
<?php
if (isset($r1)) {
  if (!empty($r1)) {
    $impr = ' <table class="table table-striped table-sm" border=1>
      <thead>
      <tr>
      <td>Nombre</td>
      <td>Descipcion</td>
      <td>PNF</td>
      <td>Opcion</td>
      </tr>
      </thead>
      <tbody>';
foreach ($r1 as $valor) {
  if (isset($valor["nombre"])) {
    $impr .= '<tr>';
    $impr .= '<td>'.$valor['nombre'].'</td>';
    $impr .= '<td>'.$valor['descripcion'].'</td>';
    $impr .= '<td>'.$valor['siglas'].'</td>';
    $impr .= '
    <td>
<form action="../Linea_de_Investigacion/cargar-controlador.php" method="POST">
 <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
        <input type="hidden" name="nombre" value="'.$valor['nombre'].'" />
        <input type="hidden" name="id_programa" value="'.$valor['id_programa'].'" />
        <input class="btn btn-primary" type="submit" value="Actualizar" />
        </div>
        </div>
      </form>
      <form action="../Linea_de_Investigacion/eliminar-controlador.php" method="POST">
      <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
        <input class="d-flex justify-content-between align-items-center" type="hidden" name="nombre" value="'.$valor['nombre'].'" />
        <input type="hidden" name="id_programa" value="'.$valor['id_programa'].'" />
        <input  class="btn btn-danger" type="submit" value="Eliminar" />
        </div>
        </div>
      </form>
    </td>

';
    $impr .= '</tr>';
  }
}
$impr .= '</tbody>';
$impr .= '</table>';
printf($impr);
  }
}
?>
</div>
<center><a  class="btn btn-sm btn-primary" href="../../Controladores/inicio/index-consultar-controlador.php">Volver</a></center>
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
