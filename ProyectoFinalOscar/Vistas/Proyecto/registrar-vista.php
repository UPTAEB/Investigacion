<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PROYECTO</title>
</head>
<body>
    <center><h1>Registrar Proyecto</h1></center>
        <nav>
        <ul>
                    <li><a href="../../index.php">Inicio</a></li>
            <li>
                Usuario
                <ul>
                    <li><a href="registrar-vista.php">Registrar</a></li>
                    <li><a href="consultar-usuario-vista.php">Consultar</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <form name="form" action="../../Controladores/Proyecto/registrar-controlador.php" method="post" >
        <center><label>Titulo:</label></center>
    <center><input type="text" name="titulo" placeholder="Ingrese su titulo"></center>
    <center><label>Objetivo General</label></center>
    <center><input type="text" name="objetivo_general" placeholder="  Objetivo General"></center>
    <center><label>Objetivo Especifico</label></center>
    <center><input type="text" name="objetivo_especifico" placeholder="  Objetivo Especifico" ></center>
    <center><label>Resumen</label></center>
    <center><input type="text" name="resumen" placeholder=" Haga un Breve resumen de su Proyecto"></center>
    <center><label>Comunidad</label></center>
    <center><input type="text" name="id_comunidad" placeholder=" ingrese la comunidad "></center>
    <center><label>Macroproyecto</label></center>
    <center><input type="text" name="id_macroproyecto" placeholder=" ingrese el macroproyecto al que pertenece"></center>
    <center><label>Grupo de Proyecto</label></center>
    <center><input type="text" name="id_grupo" placeholder=" Grupo  "></center>
    <center><label>Estado</label></center>
    <center><input type="text" name="estado" placeholder="estado en el que se encuntre su proyecto"></center>
    <center><input type="submit" name="Agregar"></center>
    </form>
    
</body>
</html>