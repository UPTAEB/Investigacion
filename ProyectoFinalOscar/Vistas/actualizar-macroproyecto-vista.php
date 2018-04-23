<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Registro Usuario</title>
</head>

<body>
	<h2>Registro Usuario</h2>
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
			if (isset($valor['nombre'])) {
				$impr = '
	<form action="../Controladores/actualizar-macroproyecto-controlador.php" method="post">
		<input type="hidden" name="nombre" value="'.$valor['nombre'].'" />
		<input type="text" name="objetivo_estrategico" id="objetivo_estrategico" value="'.$valor['objetivo_estrategico'].'" placeholder="Introduzca su Objetivo" required/>
		<input type="text" name="coordinador" id="coordinador" value="'.$valor['coordinador'].'" placeholder="Introduzca su Objetivo" required/>
		<input type="text" name="estatus" id="estatus" value="" placeholder="Introduzca su estatus" required/>
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
