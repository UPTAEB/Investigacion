<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Consultar Proyecto</title>
</head>

<body>
	<h2>Consultar Proyecto</h2>
	<nav>
		<ul>
					<li><a href="../../index.php">Inicio</a></li>
			<li>
				Usuario
				<ul>
					<li><a href="./registrar-vista.php">Registrar</a></li>
					<li><a href="consultar-vista.php">Consultar</a></li>
				</ul>
			</li>
		</ul>
	</nav>
	<form action="../../Controladores/Proyecto/consultar-controlador.php" method="post">
		<input type="text" name="titulo" id="titulo" placeholder="Introduzca el estado" />
		<input type="submit"    value="Buscar" />
	</form>
</body>
</html>