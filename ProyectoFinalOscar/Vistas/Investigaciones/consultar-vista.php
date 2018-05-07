<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Consultar Proyecto</title>
</head>

<body>
	<h2>Consultar Investigacion</h2>
	<nav>
		<ul>
					<li><a href="../../index.php">Inicio</a></li>
		</ul>
	</nav>
	<form action="../../Controladores/Investigacion/consultar-investigacion-controlador.php" method="post">
		<input type="text" name="nombre" id="nombre" placeholder="Introduzca el estado" />
		<input type="submit" value="Buscar" />
	</form>
</body>
</html>