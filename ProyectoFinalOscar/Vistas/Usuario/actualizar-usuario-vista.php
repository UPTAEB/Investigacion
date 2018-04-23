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
			if (isset($valor['cedula'])) {
				$impr = '
	<form action="../Controladores/actualizar-usuario-controlador.php" method="post">
		<input type="hidden" name="cedula" value="'.$valor['cedula'].'" />
		<input type="text" name="nombre" id="nombre" value="'.$valor['nombre'].'" placeholder="Introduzca su Nombre" required/>
		<input type="text" name="apellido" id="apellido" value="'.$valor['apellido'].'" placeholder="Introduzca su apellido" required/>
		<input type="text" name="correo" id="correo" value="'.$valor['correo'].'" placeholder="Introduzca su correo" required/>
		<input type="text" name="direccion" id="direccion" value="'.$valor['direccion'].'" placeholder="Introduzca su direccion" required/>
		<input type="text" name="telefono" id="telefono" value="'.$valor['telefono'].'" placeholder="Introduzca su telefono" required/>
		<input type="text" name="rol" id="rol" value="'.$valor['rol'].'" placeholder="Introduzca su rol" required/>
		<input type="password" name="clave" id="clave" value="" placeholder="Introduzca su Clave" required/>
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
