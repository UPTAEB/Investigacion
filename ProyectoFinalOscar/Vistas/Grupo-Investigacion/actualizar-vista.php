<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Grupo de Investigacion</title>
</head>

<body>
	<h2>Actualizar Grupo de Investigacion</h2>
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
	<form action="../GrupodeInvestigacion/actualizar-grupo_investigacion-controlador.php" method="post">
		<input type="hidden" name="nombre" value="'.$valor['nombre'].'" />
		<input type="text" name="tutor" id="tutor" value="'.$valor['tutor'].'" placeholder="Introduzca Tutor" required/>
		<input type="text" name="area_de_trabajo" id="area_de_trabajo" value="'.$valor['area_de_trabajo'].'" placeholder="Introduzca su Area de Trabajo" required/>
		<input type="text" name="tipo_unidad_investigacion" id="tipo_unidad_investigacion" value="'.$valor['tipo_unidad_investigacion'].'" placeholder="Introduzca su tipo_unidad_investigacion" required/>
		<input type="text" name="unidad_trabajo" id="unidad_trabajo" value="'.$valor['unidad_trabajo'].'" placeholder="Introduzca su unidad_trabajo" required/>
		<input type="date" name="fecha_registro" id="fecha_registro" value="'.$valor['fecha_registro'].'" placeholder="Introduzca su telefono" required/>
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