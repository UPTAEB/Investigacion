<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ORQUIDEA</title>
</head>
<body>
	<center><h1>Registrar Usuario</h1></center>
        <nav>
        <ul>
                    <li><a href="../../index.php">Inicio</a></li>
            <li>
                Usuario
                <ul>
                    <li><a href="registrar-usuario-vista.php">Registrar</a></li>
                    <li><a href="consultar-usuario-vista.php">Consultar</a></li>
                </ul>
            </li>
        </ul>
    </nav>
	<form name="form" action="../../Controladores/registro-usuario-controlador.php" method="post" >
		<center><label>Nombre:</label></center>
	<center><input type="text" name="nombre" placeholder="Ingrese su nombre"></center>
    <center><label>Direccion</label></center>
    <center><input type="text" name="direccion" placeholder=" ingrese su direccion"></center>
    <center><label>Rol</label></center>
    <center><input type="text" name="rol" placeholder=" ingrese su rol"></center>
    <center><label>Clave</label></center>
    <center><input type="password" name="clave" placeholder=" ingrese su clave"></center>
    <center><label>Apellido</label></center>
    <center><input type="text" name="apellido" placeholder=" ingrese su apellido"></center>
    <center><label>Cedula</label></center>
    <center><input type="text" name="cedula" placeholder=" ingrese su cedula"></center>
    <center><label>Telefono</label></center>
    <center><input type="text" name="telefono" placeholder=" ingrese su telefono"></center>
    <center><label>Correo</label></center>
    <center><input type="email" name="correo" placeholder=" ingrese su correo"></center>
	<center><input type="submit" name="Agregar"></center>
	</form>
	
</body>
</html>