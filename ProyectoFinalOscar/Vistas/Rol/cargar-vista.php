<!DOCTYPE html>
<html>
<head>
	<title>Grupo de Investigacion</title>
</head>
<body>
<h1>Bienvenido al Sistema</h1>
  <nav>
    <ul>
          <li><a href="../../index.php">Inicio</a></li>
    </ul>
  </nav>
  <form action="../Rol/consultar-rol-controlador.php" method="post">
    <input type="text" name="nombre_rol" id="nombre_rol" placeholder="Introduzca el Nombre del Grupo" />
    <input type="submit" value="Buscar" />
  </form>
<?php
if (isset($r1)) {
  if (!empty($r1)) {
    $impr = ' <table border=1>
      <thead>
      <tr>
      <td>Nombre</td>
      <td>Codigo</td>
      <td>Opcion</td>
      </tr>
      </thead>
      <tbody>';
foreach ($r1 as $valor) {
  if (isset($valor["nombre_rol"])) {
    $impr .= '<tr>';
    $impr .= '<td>'.$valor['nombre_rol'].'</td>';
    $impr .= '<td>'.$valor['codigo_rol'].'</td>';
    $impr .= '
    <td>
      <form action="../Rol/cargar-rol-controlador.php" method="POST">
        <input type="hidden" name="nombre_rol" value="'.$valor['nombre_rol'].'" />
        <input type="submit" value="Actualizar" />
      </form>
      <form action="../Rol/eliminar-rol-controlador.php" method="POST">
        <input type="hidden" name="nombre_rol" value="'.$valor['nombre_rol'].'" />
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