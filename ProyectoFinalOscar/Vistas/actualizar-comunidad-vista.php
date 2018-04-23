<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Actualizar</title>
</head>

<body>
	<h2>Actualizar Comunidad</h2>
	<nav>
		<ul>
					<li><a href="../index.php">Inicio</a></li>
			<li>
				Usuario
				<ul>
					<li><a href="../Vistas/registrar-usuario-vista.php">Registrar</a></li>
					<li><a href="../Vistas/consultar-usuario-vista.php">Consultar</a></li>
				</ul>
			</li>
		</ul>
	</nav>
<?php

if (isset($r1)) {
	if (!empty($r1)) {
		$impr = '';
		foreach ($r1 as $valor) {
			if (isset($valor['rif'])) {
				$impr = '
	<form action="../Controladores/actualizar-comunidad-controlador.php" method="post">
		<input type="hidden" name="rif" value="'.$valor['rif'].'" />
		<input type="text" name="nombre" id="rif" value="'.$valor['nombre'].'" placeholder="Introduzca su nombre" required/>
		<input type="text" name="estado" id="rif" value="'.$valor['estado'].'" placeholder="Introduzca su estado" required/>
		<input type="text" name="parroquia" id="rif" value="'.$valor['parroquia'].'"placeholder="Introduzca su parroquia" required/>
		<input type="text" name="municipio" id="rif" value="'.$valor['municipio'].'"placeholder="Introduzca su municipio" required/>
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
