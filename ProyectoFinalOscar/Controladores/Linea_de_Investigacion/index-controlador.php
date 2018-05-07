<?php
		require_once '../../Modelos/programa-modelo.php';
		$programa = new Programa();
		$rsPNF=$programa->getAll();
		require_once '../../Vistas/Linea-Investigacion/registrar-vista.php';
?>