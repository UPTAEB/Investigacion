<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Actualizar</title>
</head>

<body>
	<h2>Actualizar Linea de Investigacion</h2>
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
	<form action="../Linea_de_Investigacion/actualizar-controlador.php" method="post">
		<input type="hidden" name="nombre" value="'.$valor['nombre'].'" />
		<input type="text" name="descripcion" id="descripcion" value="'.$valor['descripcion'].'" placeholder="Introduzca su nombre" required/>
		<select id="id_programa" name="id_programa">';
        foreach ($rsPNF as $valor){
          if($valor['id_programa']!=null) {
          	$seleccionado="";
            if($id_programa == $valor['id_programa']){
            	$seleccionado='Selected="true"';
            }
             $impr .= '<option '.$seleccionado.' value = "'.$valor['id_programa'].'">'.$valor['siglas'].'</option>';
            }
            }
             $impr .='</select>
		<input type="submit" value="Actualizar" />
	</form>';
        }     
 

			}
		}
		printf($impr);
	}



?>
</body>

</html>
