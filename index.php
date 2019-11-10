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

  <div class="container center padding">
    <div class="row">
      <div class="col s12 m6">
        <h6 class="nombre">Hecho por Miguel González Flores</h6>
      </div>
      <div class="col s12 m6">
          <a href="nuevo_empleado.php" class="waves-effect waves-light btn blue hover">
            <i class="material-icons right">person_add</i>Nuevo
          </a>
      </div>
    </div>
  </div>
  <div class="container center">
    <h5 class="empleado">Empleados</h5>
  </div>
  <div class="container center tablaE">
    <table class="centered striped responsive-table">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Puesto</th>
          <th>Salario</th>
          <th>Cursos / %</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = mysqli_query($link, "SELECT tbl_empleado.id AS id_empleado,nombre, direccion, telefono, puesto, lenguaje, porcentaje, salario FROM tbl_empleado, tbl_datos_economicos, tbl_conocimientos, tbl_lenguajes WHERE tbl_empleado.id=tbl_datos_economicos.tbl_empleado_id AND tbl_empleado.id=tbl_conocimientos.tbl_empleado_id AND tbl_conocimientos.tbl_lenguajes_id=tbl_lenguajes.id ORDER BY nombre ASC");
        while($row=mysqli_fetch_array($query)){
          $id=$row['id_empleado'];
          $name=$row['nombre'];
          $address=$row['direccion'];
          $phone=$row['telefono'];
          $occupation=$row['puesto'];
          $course=$row['lenguaje'];
          $percentage=$row['porcentaje'];
          $salary=$row['salario'];
          echo "<tr>";
          echo "<td>$name</td> <td>$occupation</td> <td>$salary</td> <td>$course - $percentage</td>";
          echo "<td>";
          ?>
              <a onclick="showHint('<?php echo$id;?>')" class="hover" title="Ver +">
                  <i class='material-icons hover'>visibility</i>
              </a>
              <a href="editar_empleado.php?id=<?php echo$id;?>" class="hover" title="Editar">
                  <i class='material-icons hover'>edit</i>
              </a>
              <a href="borrar_empleado.php?id=<?php echo$id;?>&nombre=<?php echo$name;?>" class="hover" title="Borrar">
                  <i class='material-icons hover'>delete</i>
              </a>          
          </td>
          </tr>
        <?php
        }  
        ?>
      </tbody>
    </table>
  </div>
  <div class="container-fluid center">
    <div class="container">
      <h5 class="empleado">Información Adicional Empleado</h5>
        <div class="container-fluid center" id="empleado">
         <!--Información adicional del empleado -->
        </div>
    </div>
  </div>
	<!-- JavaScripts -->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <!-- inicialización de todos los componentes de materialize -->
  <script type="text/javascript">
    $( document ).ready(function() {
         M.AutoInit();
    });
  </script>
  <script type="text/javascript">
    function showHint(id){
      var xhttp;
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("empleado").innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", "funciones/getEmpleado.php?q="+id, true);
      xhttp.send();
    }
  </script>
</body>
</html>