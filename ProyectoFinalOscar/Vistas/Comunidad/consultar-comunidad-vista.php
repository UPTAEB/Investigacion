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
                    <li><a href="../../index.php">Inicio</a></li>
            <li>
                Comunidad
            <ul>
                <li><a href="./registrar-comunidad-vista.php">Registrar</a></li>
                <li><a href="./consultar-comunidad-vista.php">Consultar</a></li>
            </ul>
            </li>
        </ul>
        </nav>
    <form action="../../Controladores/Comunidad/consultar-comunidad-controlador.php" method="post">
        <input type="text" name="nombre" id="nombre" placeholder="Introduzca el Nombre del Usuario" />
        <input type="submit" value="Buscar" />
    </form>
</body>
</html>