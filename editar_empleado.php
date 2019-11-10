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
    <h5 class="empleado">Formulario para Cambiar Información del Empleado</h5>
    <br>
    <form>    
      <?php
      //OBTENER DATOS DEL EMPLEADO
      $id=$_GET['id'];
      $query = mysqli_query($link, "SELECT porcentaje, lenguaje, nombre, direccion, edad, telefono, puesto, salario, tbl_lenguajes.id AS id_Lenguaje FROM tbl_empleado, tbl_datos_economicos, tbl_lenguajes, tbl_conocimientos WHERE tbl_empleado.id='$id' AND tbl_datos_economicos.tbl_empleado_id='$id' AND tbl_conocimientos.tbl_empleado_id='$id' AND tbl_conocimientos.tbl_lenguajes_id=tbl_lenguajes.id");
        if($row=mysqli_fetch_array($query)){
          $id_Lenguaje=$row['id_Lenguaje'];
          $name=$row['nombre'];
          $age=$row['edad'];
          $address=$row['direccion'];
          $phone=$row['telefono'];
          $occupation=$row['puesto'];
          $salary=$row['salario'];
          $porc=$row['porcentaje'];
          $lenguaje=$row['lenguaje'];
          //echo "$id_Lenguaje -- $porc -- $lenguaje<br>";
        }
      ?>
      <div class="row">
        <div class="input-field col s12 m4">
          <input type="text" hidden name="idEm" id="idEm" value="<?php echo$id;?>">
          <input type="text" name="name" id="name" value="<?php echo$name;?>" required >
          <label>Nombre: *</label>
        </div>
        <div class="input-field col s12 m4">
          <input type="text" name="age" id="age" value="<?php echo$age;?>">
          <label>Edad:</label>
        </div>
        <div class="input-field col s12 m4">
          <input type="text" name="address" id="address" value="<?php echo$address;?>">
          <label>Dirección:</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12 m4">
          <input type="text" name="puesto" id="puesto" required value="<?php echo$occupation;?>">
          <label>Puesto: *</label>
        </div>
        <div class="input-field col s12 m4">
          <input type="text" name="salary" id="salary" required value="<?php echo$salary;?>">
          <label>Salario: *</label>
        </div>
        <div class="input-field col s12 m4">
          <input type="text" name="phone" id="phone" value="<?php echo$phone;?>">
          <label>Teléfono:</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12 m2">
        </div>
        <div class="input-field col s12 m4">
          
          <select required id="lenguaje">
            <option value="<?php echo$id_Lenguaje;?>" selected><?php echo$lenguaje;?></option>
            <?php
              $query=mysqli_query($link, "SELECT id,lenguaje FROM tbl_lenguajes");
              while  ($row=mysqli_fetch_row($query)){
            ?>
                <option  value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option> 
            <?php 
              }  
            ?>
          </select>
      
        </div>
        <div class="input-field col s12 m4">
          <input type="text" name="porciento" id="porciento" value="<?php echo$porc;?>">
          <label>Porcentaje</label>
        </div>
        <div class="input-field col s12 m2">
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12 m4">
        
        </div>  
        <div class="input-field col s12 m4">
          <a class="waves-effect waves-light btn blue hover" onclick="verificarDatos();">
              <span>Actualizar</span>
          </a>
        </div>
        <div class="input-field col s12 m4">
          
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
        var idEm = document.getElementById("idEm").value;

        var name = document.getElementById("name").value;

        var age = document.getElementById("age").value;

        var address = document.getElementById("address").value;

        var puesto = document.getElementById("puesto").value;

        var salary = document.getElementById("salary").value;

        var phone = document.getElementById("phone").value;

        var id_Len = document.getElementById("lenguaje").value;

        var porciento = document.getElementById("porciento").value;

        if(name=="")
            M.toast({html: 'Falta Introducir el Nombre.'});
        else if(puesto=="")
           M.toast({html: 'Falta poner el Puesto del Empleado.'});
        else if(salary=="")
           M.toast({html: 'Falta poner el Salario.'});
        else{
            //////////////////////////
            ///PARA EDITAR EMPLEADO///
            //////////////////////////
            $.post("funciones/editarEmpleado.php", { v1: name, v2: age, v3: address, v4: phone, v5: puesto, v6: salary, v7: idEm, v8: id_Len, v9: porciento}, function(data){
              $("#resultado").html(data);   
            });
        }
    }
  </script>
</body>
</html>