<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistema de Información</title>

      <!-- Bootstrap core CSS -->
    <link href="./recursos/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./recursos/css/floating-labels.css" rel="stylesheet">
</head>

<body>
	<form class="form-signin" method="POST" action="./Controladores/Login/login-controlador.php">
              <div class="text-center mb-4"> 
              <img class="mb-4" src="./recursos/Imagenes/user-icon-png-pnglogocom.png" alt="Logo" width="90" height="90">
              <h1 class="h3 mb-3 font-weight-normal">Sistema de Control de Investigaciones</h1>
              <p>
                   Ingrese sus Credenciales
              </p>
          </div>

<div class="form-label-group">
<input type="email" class="form-control" id="inputEmail"  name="correo" placeholder="Ingrese su Usuario" required>
 <label for="inputEmail">Email</label>
 </div>

 <div class="form-label-group">
  <input type="password" class="form-control" id="inputPassword" name="clave" placeholder="Contraseña" required> 
  <label for="inputPassword">Contraseña</label>
 </div>
 <center>
   <button class="btn btn-lg btn-primary" type="submit">Ingresar</button>
    <button class="btn btn-lg btn-success" type="reset">Borrar</button>
 </center>
 <p class="mt-5 mb-3 text-muted text-center"> <img  src="./recursos/Imagenes/logo uptaeb.png" alt="Logo" width="35" height="35"> &copy; UPTAEB 2018</p>
	</form>
</body>
</html>