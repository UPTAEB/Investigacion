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
			<li>
				Proyecto
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
			if (isset($valor['titulo'])) {
				$impr = '
	<form action="../../Controladores/Proyecto/actualizar-controlador.php" method="post">
		<input type="hidden" name="titulo" value="'.$valor['titulo'].'" />
		<input type="text" name="objetivo_general" id="objetivo_general" value="'.$valor['objetivo_general'].'" placeholder="Objetivo General" required/>
		<input type="text" name="objetivo_especifico" id="objetivo_especifico" value="'.$valor['objetivo_especifico'].'" placeholder="Objetivo Especifico" required/>
		<input type="text" name="resumen" id="resumen" value="'.$valor['resumen'].'" placeholder="Resumen" required/>
		<input type="text" name="estado" id="estado" value="'.$valor['estado'].'" placeholder="Estado" required/>
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
