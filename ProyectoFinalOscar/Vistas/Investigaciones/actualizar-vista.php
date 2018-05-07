<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Registro Proyecto</title>
</head>

<body>
	<h2>Registro Proyecto</h2>
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
	<form action="../Investigacion/actualizar-investigacion-controlador.php" method="post">
		<input type="hidden" name="nombre" value="'.$valor['nombre'].'" />
		<input type="text" name="tipo_de_investigacion" id="tipo_de_investigacion" value="'.$valor['tipo_de_investigacion'].'" placeholder="Objetivo General" required/>
		<input type="date" name="fecha_inicio" id="fecha_inicio" value="'.$valor['fecha_inicio'].'" placeholder="Fecha de Inicio" required/>
		<input type="date" name="fecha_culminacion" id="fecha_culminacion" value="'.$valor['fecha_culminacion'].'" placeholder="fecha de Culminacion" required/>
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