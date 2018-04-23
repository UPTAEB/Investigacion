<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Mensaje</title>
</head>
<body>
<h1>Mensaje</h1>
	<nav>
		<ul>
					<li><a href="../../inicio.php">Inicio</a></li>
			<li>
				Proyecto
				<ul>
					<li><a href="../../Vistas/Proyecto/registrar-vista.php">Registrar</a></li>
					<li><a href="../../Vistas/Proyecto/consultar-vista.php">Consultar </a></li>
				</ul>
			</li>
		</ul>
	</nav>
<?php
if (isset($mensaje)) {
	printf($mensaje);
}
?>
</body>
</html>
