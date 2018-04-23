<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Bienvenido al Sistema</h1>
  <nav>
    <ul>
          <li><a href="../inicio.php">Inicio</a></li>
      <li>
        Macroproyecto
        <ul>
          <li><a href="registrar-macroproyecto-vista.php">Registrar </a></li>
          <li><a href="">Consultar </a></li>            
        </ul>
      </li>
    </ul>
  </nav>
<center><h1>Registrar Macroproyecto</h1></center>
<form name="form" action="../Controladores/registro-macroproyecto-controlador.php" method="post">
   <center> Nombre : </center>
   		<center><input type="text" name="nombre" placeholder=" Ejemplo: Sistema Web" /></center>
    <center>Objetivo Estrategico: 
    	<center><input type="text" name="objetivo_estrategico" placeholder=" Ejemplo: Instalar us Sistema" /></center>
    <center>Coordinador: </center>
    	<center><input type="text" name="coordinador" placeholder=" Ejemplo: Carlos Soto" /></center>
    <center>Estatus: </center>
    	<center><input type="text" name="estatus" placeholder=" Ingrese Sus Estatus" /></center>
    <input type="submit" name="Agregar">
    
</form>
</body>
</html>