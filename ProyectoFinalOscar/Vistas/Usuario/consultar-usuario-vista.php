<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Consultar Usuario</title>
</head>

<body>
	<h2>Consultar Usuario</h2>
	<nav>
		<ul>
					<li><a href="../index.php">Inicio</a></li>
			<li>
				Usuario
				<ul>
					<li><a href="registrar-usuario-vista.php">Registrar</a></li>
					<li><a href="consultar-usuario-vista.php">Consultar</a></li>
				</ul>
			</li>
		</ul>
	</nav>
	<form action="../../Controladores/Usuario/consultar-usuario.controlador.php" method="post">
		<input type="text" name="nombre" id="nombre" placeholder="Introduzca el Nombre del Usuario" />
		<input type="submit" value="Buscar" />
	</form>
</body>

</html>