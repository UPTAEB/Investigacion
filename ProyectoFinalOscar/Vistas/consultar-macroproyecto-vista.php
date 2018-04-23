<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Consultar Macroproyecto</title>
</head>

<body>
	<h2>Consultar Macroproyecto</h2>
	<nav>
		<ul>
					<li><a href="../index.php">Inicio</a></li>
			<li>
				Usuario
				<ul>
					<li><a href="registrar-macroproyecto-vista.php">Registrar</a></li>
					<li><a href="consultar-macroproyecto-vista.php">Consultar</a></li>
				</ul>
			</li>
		</ul>
	</nav>
	<form action="../Controladores/consultar-macroproyecto-controlador.php" method="post">
		<input type="text" name="nombre" id="nombre" placeholder="Introduzca el Nombre del Usuario" />
		<input type="submit" value="Buscar" />
	</form>
<?php
if (isset($r1)) {
	if (!empty($r1)) {
		$impr = '	<table border=1>
			<thead>
			<tr>
			<td>Coordinador</td>
			<td>Nombre</td>
			<td>Objetivo Estrategico</td>
			<td>Estatus</td>
			<td>Opcion</td>
			</tr>
			</thead>
			<tbody>';
foreach ($r1 as $valor) {
	if (isset($valor["nombre"])) {
		$impr .= '<tr>';
		$impr .= '<td>'.$valor['coordinador'].'</td>';
		$impr .= '<td>'.$valor['nombre'].'</td>';
		$impr .= '<td>'.$valor['objetivo_estrategico'].'</td>';
		$impr .= '<td>'.$valor['estatus'].'</td>';
		$impr .= '
		<td>
			<form action="../Controladores/cargar-macroproyecto-controlador.php" method="POST">
				<input type="hidden" name="nombre" value="'.$valor['nombre'].'" />
				<input type="submit" value="Actualizar" />
			</form>
			<form action="../Controladores/eliminar-macroproyecto-controlador.php" method="POST">
				<input type="hidden" name="nombre" value="'.$valor['nombre'].'" />
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