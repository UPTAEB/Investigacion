<!DOCTYPE html>
<html>
<head>
	<title>SubProyecto</title>
</head>
<body>
<h1>Bienvenido al Sistema</h1>
  <nav>
    <ul>
          <li><a href="../index.php">Inicio</a></li>
    </ul>
  </nav>
  <form action="../SubProyecto/consultar-subproyecto-controlador.php" method="post">
    <input type="text" name="descripcion" id="descripcion" placeholder="Introduzca el Nombre del Grupo" />
    <input type="submit" value="Buscar" />
  </form>
<?php
if (isset($r1)) {
  if (!empty($r1)) {
    $impr = ' <table border=1>
      <thead>
      <tr>
      <td>Descripcion</td>
      <td>Opcion</td>
      </tr>
      </thead>
      <tbody>';
foreach ($r1 as $valor) {
  if (isset($valor["descripcion"])) {
    $impr .= '<tr>';
    $impr .= '<td>'.$valor['descripcion'].'</td>';
    $impr .= '
    <td>
      <form action="../SubProyecto/eliminar-subproyecto-controlador.php" method="POST">
        <input type="hidden" name="descripcion" value="'.$valor['descripcion'].'" />
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