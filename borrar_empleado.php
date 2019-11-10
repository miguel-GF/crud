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
          <li class="active"><a href="index.php">Empleados</a></li>
          <li><a href="lenguajes.php">Lenguajes</a></li>
        </ul>
      </div>
    </nav>
  </div>
  <!-- menu tamaño mobil -->
  <ul class="sidenav" id="mobile-demo">
    <li class="active"><a href="index.php">Empleados</a></li>
    <li><a href="lenguajes.php">Lenguajes</a></li>
  </ul>

  <div class="container padding center">
    <h5 class="borrar"><span>¿Realmente desea borrar al Usuario?</span></h5>
    <form>    
      <?php
      //OBTENER DATOS DEL EMPLEADO
      $id=$_GET['id'];
      $name=$_GET['nombre'];
      echo "<input type='text' value=$id id='id' hidden>";
      echo "<h5>Empleado Seleccionado: $name</h5>";
      $query = mysqli_query($link, "SELECT tbl_lenguajes.id AS len_id, edad, nombre, direccion, fecha_nacimiento, telefono, puesto, lenguaje, porcentaje, salario, estado FROM tbl_empleado, tbl_datos_economicos, tbl_conocimientos, tbl_lenguajes WHERE tbl_empleado.id='$id' AND tbl_datos_economicos.tbl_empleado_id='$id' AND tbl_conocimientos.tbl_empleado_id='$id' AND tbl_conocimientos.tbl_lenguajes_id='$id' AND tbl_lenguajes.id='$id' ");
        while($row=mysqli_fetch_array($query)){
          $id_Lenguaje=$row['len_id'];
          $age=$row['edad'];
          $birth=$row['fecha_nacimiento'];
          $name=$row['nombre'];
          $address=$row['direccion'];
          $phone=$row['telefono'];
          $occupation=$row['puesto'];
          $course=$row['lenguaje'];
          $porc=$row['porcentaje'];
          $salary=$row['salario'];
          $status=$row['estado'];
        }
      ?>

      <div class="row">
        <div class="input-field col s12 m2">
        
        </div>  
        <div class="input-field col s12 m4">
          <a class="waves-effect waves-light btn red hover" onclick="verificarDatos();">
            <i class="material-icons right">delete</i><span>SI<span>
          </a>
        </div>
        <div class="input-field col s12 m4">
          <a href="index.php" class="waves-effect waves-light btn green accent-3 hover">
            <i class="material-icons right">keyboard_return</i><span>NO</span>
          </a>
        </div>
        <div class="input-field col s12 m2">
        
        </div>  
      </div>
    </form>
  </div>
  <div class="container" id="resultado"></div>
	<!-- JavaScripts -->
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <!-- inicialización de todos los componentes de materialize -->
  <script type="text/javascript">
    $( document ).ready(function() {
         M.AutoInit();
    });
  </script>
  <script type="text/javascript">
    function verificarDatos(){
        var idEm = document.getElementById("id").value;
        //////////////////////////
        ///PARA BORRAR EMPLEADO///
        //////////////////////////
        $.post("funciones/borrarEmpleado.php", { v1: idEm}, function(data){
              $("#resultado").html(data);   
        });
    }
  </script>
</body>
</html>