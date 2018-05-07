<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Grupo de Investigacion</title>
</head>

<body>
	<h2>Actualizar Rol</h2>
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
			if (isset($valor['nombre_rol'])) {
				$impr = '
	<form action="../Rol/actualizar-rol-controlador.php" method="post">
		<input type="hidden" name="nombre_rol" value="'.$valor['nombre_rol'].'" />
		<input type="text" name="codigo_rol" id="codigo_rol" value="'.$valor['codigo_rol'].'" placeholder="Introduzca codigo" required/>
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