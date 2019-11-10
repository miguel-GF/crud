<?php include("funciones/conexion.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>E-commerce Test</title>
	<!-- CSS -->
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
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
          <li><a href="index.php">Empleados</a></li>
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

  <div class="container padding">
    <a href="nuevo_lenguaje.php" class="waves-effect waves-light btn blue hover"><i class="material-icons right">add</i>Nuevo</a>
  </div>

  <div class="container center padding">
    <h5 class="empleado">Lenguajes</h5>
  </div>
  <div class="container padding center tablaL">
    <table class="centered striped responsive-table">
      <thead>
        <tr>
          <th>#</th>
          <th>Lenguaje</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = mysqli_query($link, "SELECT id, lenguaje FROM tbl_lenguajes ORDER BY lenguaje ASC");
        while($row=mysqli_fetch_array($query)){
          $id=$row['id'];
          $lenguaje=$row['lenguaje'];
          echo "<tr>";
          echo "<td>$id</td> <td>$lenguaje</td>";
          echo "</tr>";
        }  
        ?>
      </tbody>
    </table>
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
</body>
</html>