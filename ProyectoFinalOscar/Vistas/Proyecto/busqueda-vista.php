<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Consultar Proyecto</title>
</head>

<body>
	<h2>Consultar Proyecto</h2>
	<nav>
		<ul>
					<li><a href="../../inicio.php">Inicio</a></li>
			<li>
				Usuario
				<ul>
					<li><a href="../../Vistas/Proyecto/registrar-vista.php">Registrar</a></li>
					<li><a href="../../Vistas/Proyecto/consultar-vista.php">Consultar</a></li>
				</ul>
			</li>
		</ul>
	</nav>
	<form action="../../Controladores/Proyecto/consultar-controlador.php" method="post">
		<input type="text" name="estado" id="estado" placeholder="Introduzca el Titulo" />
		<input type="submit"    value="Buscar" />
	</form>
<?php
if (isset($r2)) {
	if (!empty($r2)) {
		$impr = '	<table border=1>
			<thead>
			<tr>
			<td>Titulo</td>
			<td>Objetivo General</td>
			<td>Objetivo Especifico</td>
			<td>Resumen</td>
			<td>Estado</td>
			<td>Comunidad</td>
			<td>Opcion</td>
			</tr>
			</thead>
			<tbody>';
foreach ($r2 as $valor) {
	if (isset($valor["estado"])) {
		$impr .= '<tr>';
		$impr .= '<td>'.$valor['titulo'].'</td>';
		$impr .= '<td>'.$valor['objetivo_general'].'</td>';
		$impr .= '<td>'.$valor['objetivo_especifico'].'</td>';
		$impr .= '<td>'.$valor['resumen'].'</td>';
		$impr .= '<td>'.$valor['estado'].'</td>';
		$impr .= '<td>'.$valor['id_comunidad'].'</td>';

		$impr .= '
		<td>
			<form action="../../Controladores/Proyecto/cargar-controlador.php" method="POST">
				<input type="hidden" name="titulo" value="'.$valor['titulo'].'" />
				<input type="submit" value="Actualizar" />
			</form>
			<form action="../../Controladores/Proyecto/eliminar-controlador.php" method="POST">
				<input type="hidden" name="titulo" value="'.$valor['titulo'].'" />
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