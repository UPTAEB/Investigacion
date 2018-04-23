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
					<li><a href="../../index.php">Inicio</a></li>
					<li><a href="../../inicio.php">Inicio 2</a></li>
		</ul>
<?php
if (isset($mensaje)) {
	printf($mensaje);
}
?>
</body>
</html>
