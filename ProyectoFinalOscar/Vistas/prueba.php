<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../recursos/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../recursos/css/estilo.css">
	<title>una prueba</title>
</head>
<body>
	<div class="wrapper">
      <h3>Ingrese sus Datos</h3>
      <form class="needs-validation" novalidate action="">
        <div >
       <div class="form-row">
      <div class="col-md-3 mb-3">
      <label for="validationTooltip05">Cedula</label>
      <input type="text" class="form-control" id="validationTooltip05" name="cedula" placeholder="Cedula" required>
      <div class="invalid-tooltip">
        Please Introduzca Cedula.
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationTooltip01">Nombre</label>
      <input type="text" class="form-control" id="validationTooltip01" name="nombre" placeholder="Nombre"  required>
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationTooltip02">Apellido</label>
      <input type="text" class="form-control" id="validationTooltip02" name="apellido" placeholder="Apellido" required>
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>

  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationTooltipUsername">Correo</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
        </div>
        <input type="email" class="form-control" id="validationTooltipUsername" name="correo" placeholder="Email" aria-describedby="validationTooltipUsernamePrepend" required>
        <div class="invalid-tooltip">
          Please choose a unique and valid Email.
        </div>
      </div>
    </div>  
    <div class="form-row">
    <div class="col-md-8 mb-3">
      <label for="validationTooltip03">Contraseña</label>
      <input type="password" class="form-control" id="validationTooltip03" name="clave" placeholder="Contraseña" required>
      <div class="invalid-tooltip">
        Please Ingrese Contraseña.
      </div>
    </div> 
  </div>
   
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationTooltip03">Direccion</label>
      <input type="text" class="form-control" id="validationTooltip03"  name="direccion" placeholder="Direccion" required>
      <div class="invalid-tooltip">
        Please provide a valid city.
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationTooltip04">Telefono</label>
      <input type="text" class="form-control" id="validationTooltip04" name="telefono" placeholder="Telefono" required>
      <div class="invalid-tooltip">
        Please provide a valid state.
      </div>
    </div>
  </div>
  <button class="btn btn-primary" type="submit" name="agregar">Enviar Formulario</button>
  <button type="reset" class="btn btn-danger">Borrar</button>
    </div>
</body>
</html>