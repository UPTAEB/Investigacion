<!DOCTYPE html>
<html>
<head>
	<title>Grupo de Investigacion</title>
</head>
<body>
<h1>Bienvenido al Sistema</h1>
  <nav>
    <ul>
          <li><a href="../../index.php">Inicio</a></li>
      <li>
        Grupo de Investigacion
        <ul>
          <li><a href="registrar-vista.php">Registrar </a></li>
          <li><a href="consultar-vista.php">Consultar </a></li>            
        </ul>
      </li>
    </ul>
  </nav>
  <form action="../../Controladores/GrupodeInvestigacion/consultar-grupo_investigacion-controlador.php" method="post">
    <input type="text" name="nombre" id="nombre" placeholder="Introduzca el Nombre del Grupo" />
    <input type="submit" value="Buscar" />
  </form>
</body>
</html>