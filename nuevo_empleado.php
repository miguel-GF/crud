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
    <h5 class="empleado">Formulario para Agregar un Nuevo Empleado</h5>
    <form method="post">    
      <div class="row">
        <div class="input-field col s12 m4">
          <input type="text" name="name" id="name" required>
          <label>Nombre: *</label>
        </div>
        <div class="input-field col s12 m4">
          <input type="text" name="age" id="age">
          <label>Edad:</label>
        </div>
        <div class="input-field col s12 m4">
          <input type="text" name="address" id="address">
          <label>Dirección:</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12 m4">
          <input type="text" name="status" id="status" required>
          <label>Estado: *</label>
        </div>
        <div class="input-field col s12 m4">
          <input class="datepicker" type="text" name="birthdate" id="birthdate">
          <label>Fecha de Nacimiento:</label>
        </div>
        <div class="input-field col s12 m4">
          <input type="text" name="phone" id="phone">
          <label>Teléfono:</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12 m2">
        </div>
        <div class="input-field col s12 m4">
          <input type="text" name="puesto" id="puesto" required>
          <label>Puesto: *</label>
        </div>
        <div class="input-field col s12 m4">
          <input type="text" name="salary" id="salary" required>
          <label>Salario: *</label>
        </div>
        <div class="input-field col s12 m2">
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12 m2">
        </div>
        <div class="input-field col s12 m4">
          
          <select required class="" id="lenguaje">
            <option value="" disabled selected>Selecione Lenguaje *</option>
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
          <input type="text" name="porciento" id="porciento">
          <label>Porcentaje</label>
        </div>
        <div class="input-field col s12 m2">
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12 m2">
        
        </div>  
        <div class="input-field col s12 m4">
          <a class="waves-effect waves-light btn blue hover" onclick="verificarDatos();">
            <span>Guardar</span>
          </a>
        </div>
        <div class="input-field col s12 m4">
          <button type="reset" class="waves-effect waves-light btn blue hover">
            <span>Limpiar</span>
          </button>
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
        var name = document.getElementById("name").value;

        var age = document.getElementById("age").value;

        var address = document.getElementById("address").value;

        var status = document.getElementById("status").value;

        var birth = document.getElementById("birthdate").value;

        var phone = document.getElementById("phone").value;

        var puesto = document.getElementById("puesto").value;

        var salary = document.getElementById("salary").value;

        var lenguaje = document.getElementById("lenguaje").value;

        var porciento = document.getElementById("porciento").value;
       
        if(name=="")
            M.toast({html: 'Falta Introducir el Nombre.'});
        else if(status=="")
           M.toast({html: 'Falta poner el Estado.'});
        else if(puesto=="")
           M.toast({html: 'Falta poner el Puesto del Empleado.'});
        else if(salary=="")
           M.toast({html: 'Falta poner el Salario.'});
        else if(lenguaje=="")
           M.toast({html: 'Falta seleccionar el Lenguaje'});
        else{
            ///////////////////////////
            ///PARA AGREGAR EMPLEADO///
            ///////////////////////////
            $.post("funciones/altaEmpleado.php", { v1: name, v2: age, v3: address, v4: status, v5: birth, v6: phone, v7: puesto, v8: salary, v9: lenguaje, v10: porciento}, function(data){
              $("#resultado").html(data);   
            });
        }
    }
  </script>
</body>
</html>