<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Registro Investigador</title>
</head>

<body>
	<h2>Registro Investigador</h2>
	<nav>
		<ul>
					<li><a href="../index.php">Inicio</a></li>
			<li>
				Usuario
				<ul>
					<li><a href="../Vistas/registrar-investigador-vista.php">Registrar</a></li>
					<li><a href="../Vistas/consultar-investigador-vista.php">Consultar</a></li>
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
	<form action="../Controladores/actualizar-investigador-controlador.php" method="post">
		<input type="hidden" name="nombre" value="'.$valor['nombre'].'" />
		<input type="text" name="apellido" id="nombre" value="'.$valor['apellido'].'" placeholder="Introduzca su apellido" required/>
		<input type="text" name="telefono" id="nombre" value="'.$valor['telefono'].'" placeholder="Introduzca su Telefono" required/>
		<input type="text" name="correo" id="nombre" value="'.$valor['correo'].'" placeholder="Introduzca su correo" required/>
		<input type="text" name="nivel_academico" id="nombre" value="'.$valor['nivel_academico'].'" placeholder="Introduzca su nivel academico" required/>
		<input type="text" name="direccion" id="direccion" value="" placeholder="Introduzca su Direccion" required/>
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
