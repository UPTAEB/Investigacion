<!DOCTYPE html>
<html>
<head>
	<title>PNF</title>
</head>
<body>
<h1>Bienvenido al Sistema</h1>
  <nav>
    <ul>
          <li><a href="../../index.php">Inicio</a></li>
    </ul>
  </nav>
  <form action="../../Controladores/Linea_de_Investigacion/consultar-controlador.php" method="post">
    <input type="text" name="nombre" id="nombre" placeholder="Introduzca el Nombre del Grupo" />
    <input type="submit" value="Buscar" />
  </form>
</body>
</html>