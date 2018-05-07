<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ORQUIDEA</title>
</head>
<body>
	<center><h1>Registro de Rol</h1></center>
        <nav>
        <ul>
                    <li><a href="../../index.php">Inicio</a></li>
        </ul>
    </nav>
	<form name="form" action="../../Controladores/Rol/registro-rol-controlador.php" method="post" >
		<center><label>Nombre del Rol:</label></center>
	<center><input type="text" name="nombre_rol" placeholder="Ingrese su nombre"></center>
    <center><label>Numero de Rol:</label></center>
    <center><input type="text" name="codigo_rol" placeholder=" ingrese el codigo del rol"></center>
	<center><input type="submit" name="Agregar"> <input type="reset" name="Eliminar"></center>
	</form>
	
</body>
</html>