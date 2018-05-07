<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Actualizar</title>
</head>

<body>
	<h2>Actualizar Linea de Investigacion</h2>
	<nav>
		<ul>
					<li><a href="../../index.php">Inicio</a></li>
		</ul>
	</nav>
<?php

if (isset($r1)) {
	if (!empty($r1)) {
		$impr = '';
		foreach ($r1 as $valor) {
			if (isset($valor['nombre'])) {
				$impr = '
	<form action="../Programa/actualizar-programa-controlador.php" method="post">
		<input type="hidden" name="nombre" value="'.$valor['nombre'].'" />
		<input type="text" name="descripcion" id="descripcion" value="'.$valor['descripcion'].'" placeholder="Introduzca su nombre" required/>
		<input type="text" name="siglas" id="siglas" value="'.$valor['siglas'].'" placeholder="Introduzca su estado" required/>
		<input type="submit" value="Actualizar" />
	</form>
';
			}
		}
		printf($impr);
	}
}


?>
</body>

</html>
