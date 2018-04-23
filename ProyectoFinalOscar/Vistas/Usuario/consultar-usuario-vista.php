<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Consultar Usuario</title>
</head>

<body>
	<h2>Consultar Usuario</h2>
	<nav>
		<ul>
					<li><a href="../index.php">Inicio</a></li>
			<li>
				Usuario
				<ul>
					<li><a href="registrar-usuario-vista.php">Registrar</a></li>
					<li><a href="consultar-usuario-vista.php">Consultar</a></li>
				</ul>
			</li>
		</ul>
	</nav>
	<form action="../../Controladores/consultar-usuario.controlador.php" method="post">
		<input type="text" name="nombre" id="nombre" placeholder="Introduzca el Nombre del Usuario" />
		<input type="submit" value="Buscar" />
	</form>
<?php
if (isset($r1)) {
	if (!empty($r1)) {
		$impr = '	<table border=1>
			<thead>
			<tr>
			<td>Cedula</td>
			<td>Nombre</td>
			<td>Apellido</td>
			<td>Correo</td>
			<td>Direccion</td>
			<td>Telefono</td>
			<td>Rol</td>
			<td>Opcion</td>
			</tr>
			</thead>
			<tbody>';
foreach ($r1 as $valor) {
	if (isset($valor["nombre"])) {
		$impr .= '<tr>';
		$impr .= '<td>'.$valor['cedula'].'</td>';
		$impr .= '<td>'.$valor['nombre'].'</td>';
		$impr .= '<td>'.$valor['apellido'].'</td>';
		$impr .= '<td>'.$valor['correo'].'</td>';
		$impr .= '<td>'.$valor['direccion'].'</td>';
		$impr .= '<td>'.$valor['telefono'].'</td>';
		$impr .= '<td>'.$valor['rol'].'</td>';

		$impr .= '
		<td>
			<form action="../Controladores/cargar-usuario-controlador.php" method="POST">
				<input type="hidden" name="cedula" value="'.$valor['cedula'].'" />
				<input type="submit" value="Actualizar" />
			</form>
			<form action="../Controladores/eliminar-usuario-controlador.php" method="POST">
				<input type="hidden" name="cedula" value="'.$valor['cedula'].'" />
				<input type="submit" value="Eliminar" />
			</form>
		</td>

';
		$impr .= '</tr>';
	}
}
$impr .= '</tbody>';
$impr .= '</table>';
printf($impr);
	}
}
?>
</body>

</html>