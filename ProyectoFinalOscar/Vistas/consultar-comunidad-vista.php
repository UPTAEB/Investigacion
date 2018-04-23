<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consultar Comunidad</title>
</head>
<body>
    <center><h1>Consultar Comunidad</h1></center>
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
        <ul>
            <li>
                Comunidad
            <ul>
                <li><a href="registrar-comunidad-vista.php">Registrar</a></li>
                <li><a href="consultar-comunidad-vista.php">Consultar</a></li>
            </ul>
            </li>
        </ul>
        </nav>
    <form action="../Controladores/consultar-comunidad-controlador.php" method="post">
        <input type="text" name="nombre" id="nombre" placeholder="Introduzca el Nombre del Usuario" />
        <input type="submit" value="Buscar" />
    </form>
<?php
if (isset($r1)) {
    if (!empty($r1)) {
        $impr = '   <table border=1>
            <thead>
            <tr>
            <td>Nombre</td>
            <td>Rif</td>
            <td>Municipio</td>
            <td>Estado</td>
            <td>Parroquia</td>
            <td>Opcion</td>
            </tr>
            </thead>
            <tbody>';
foreach ($r1 as $valor) {
    if (isset($valor["rif"])) {
        $impr .= '<tr>';
        $impr .= '<td>'.$valor['nombre'].'</td>';
        $impr .= '<td>'.$valor['rif'].'</td>';
        $impr .= '<td>'.$valor['municipio'].'</td>';
        $impr .= '<td>'.$valor['estado'].'</td>';
        $impr .= '<td>'.$valor['parroquia'].'</td>';
        $impr .= '
        <td>
            <form action="../Controladores/cargar-comunidad-controlador.php" method="POST">
                <input type="hidden" name="rif" value="'.$valor['rif'].'" />
                <input type="submit" value="Actualizar" />
            </form>
            <form action="../Controladores/eliminar-comunidad-controlador.php" method="POST">
                <input type="hidden" name="rif" value="'.$valor['rif'].'" />
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