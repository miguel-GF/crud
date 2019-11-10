<?php include("funciones/conexion.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>E-commerce Test</title>
	<!-- CSS -->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
	<div class="navbar-fixed">
    <nav class="blue">
      <div class="container nav-wrapper">
        <a href="index.php" class="brand-logo center">E-Test</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger">
            <i class="material-icons">menu</i>
        </a>
        <ul class="right hide-on-med-and-down">
          <li ><a href="index.php">Empleados</a></li>
          <li class="active"><a href="lenguajes.php">Lenguajes</a></li>
        </ul>
      </div>
    </nav>
  </div>
  <!-- menu tamaño mobil -->
  <ul class="sidenav" id="mobile-demo">
    <li><a href="index.php">Empleados</a></li>
    <li class="active"><a href="lenguajes.php">Lenguajes</a></li>
  </ul>
  <br>
  <div class="container padding center">
    <h5 class="empleado">Formulario para Agregar un Nuevo Lenguaje</h5>
    <br><br>
    <form method="post">    
      <div class="row">
        <div class="input-field col s12 m2">
        
        </div>
        <div class="input-field col s12 m4">
          <input type="text" name="lenguaje" id="lenguaje" required>
          <label>Lenguaje Nuevo</label>
        </div>  
        <div class="input-field col s12 m4">
          <a class="waves-effect waves-light btn blue hover" onclick="verificarDatos();">
              <span>Guardar</span>
          </a>
        </div>
        <div class="input-field col s12 m2">
        
        </div>  
      </div>
    </form>
  </div>
  <div class="container" id="resultado"></div>
	<!-- JavaScripts -->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <!-- inicialización de todos los componentes de materialize -->
  <script type="text/javascript">
    $( document ).ready(function() {
         M.AutoInit();
    });
  </script>
    <script type="text/javascript">
    function verificarDatos() {
      var lenguaje = document.getElementById("lenguaje").value;
      
      if(lenguaje=="")
          M.toast({html: 'Falta Escribir el Lenguaje de Programación'});
      else {
          ///////////////////////////
          ///PARA AGREGAR LENGUAJE///
          ///////////////////////////
          $.post("funciones/altaLenguaje.php", { v1: lenguaje }, function(data){
              $("#resultado").html(data);   
          });
      }
    }
  </script>
</body>
</html>