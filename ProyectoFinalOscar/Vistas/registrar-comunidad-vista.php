<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registrar Comunidad</title>
</head>
<body>
	<center><h1>Registrar Comunidad</h1></center>
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
    <form name="form" action="../Controladores/registro-comunidad-controlador.php" method="POST">
    <center><label>Nombre de la Comunidad</label></center>
    <center><input type="text" name="nombre" placeholder=" Ejemple: UPTAEB"></center>
    <center><label>RIF</label></center>
    <center><input type="text" name="rif" placeholder="Ingrese su RIF"></center>
    <center>Municipio</center>
    <center><input type="text" name="municipio" placeholder="Ingrese su Municipio"></center>
    <center><label>Estado</label></center>
    <center><input type="text" name="estado" placeholder="Ingrese su Estado"></center>
    <center><label>Parroquia</label></center>
    <center><input type="text" name="parroquia" placeholder="Ingrese su Parroquia"></center>
    <center><input type="submit" name="Agregar"></center>
    </form>
</body>
</html>