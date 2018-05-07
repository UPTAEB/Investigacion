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
    </ul>
  </nav>
  <form action="../../Controladores/Rol/consultar-rol-controlador.php" method="post">
    <input type="text" name="nombre_rol" id="nombre-_rol" placeholder="Introduzca el Nombre del Grupo" />
    <input type="submit" value="Buscar" />
  </form>
</body>
</html>