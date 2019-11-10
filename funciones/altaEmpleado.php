<?php
	include("conexion.php");
	$name=$_POST['v1'];
    $age=$_POST['v2'];
 	$address=$_POST['v3'];
 	$status=$_POST['v4'];
    $birthdate=$_POST['v5'];
 	$phone=$_POST['v6'];
 	$puesto=$_POST['v7'];
 	$salary=$_POST['v8'];
 	$lenguaje=$_POST['v9'];
 	$porciento=$_POST['v10'];
 	////ALTA EMPLEADO////
 	if(mysqli_query($link, "INSERT INTO tbl_empleado(nombre, edad, direccion, estado, fecha_nacimiento, telefono) VALUES('$name','$age','$address','$status','$birthdate','$phone')")){
 		//echo "<script>M.toast({html: 'Empleado Agregado Correctamente'})</script>";
    }
    else{
    	echo "<script>M.toast({html: 'No se pudo Agregar Empleado'})</script>";
    	 die("Connection failed: " . mysqli_connect_error());
    }
    ////////
    if($query=mysqli_query($link, "SELECT MAX(id) AS maximo FROM tbl_empleado")){
           if  ($row=mysqli_fetch_array($query))
           		$id=$row['maximo'];
    }
    else{
    	echo "<script>M.toast({html: 'Ocurrio error'})</script>";
    	 die("Connection failed: " . mysqli_connect_error());
    }
    ///ALTA DATOS ECONOMICOS///
    if(mysqli_query($link, "INSERT INTO tbl_datos_economicos(puesto, salario, tbl_empleado_id) VALUES('$puesto','$salary','$id')")){
 		//echo "<script>M.toast({html: 'Empleado Agregado Correctamente'})</script>";
    }
    else{
	   	echo "<script>M.toast({html: 'No se pudo Agregar Datos Económicos'})</script>";
	   	 die("Connection failed: " . mysqli_connect_error());
    }
    ///ALTA CONOCIMIENTOS///
    if(mysqli_query($link, "INSERT INTO tbl_conocimientos(porcentaje, tbl_empleado_id, tbl_lenguajes_id) VALUES('$porciento','$id','$lenguaje')")){
 		//echo "<script>M.toast({html: 'Empleado Agregado Correctamente'})</script>";
    }
    else{
	   	echo "<script>M.toast({html: 'No se pudo Agregar Conocimientos'})</script>";
	   	 die("Connection failed: " . mysqli_connect_error());
    }

    echo "<script>M.toast({html: 'Empleado Agregado Correctamente'})</script>";
    mysqli_close($link);
?>