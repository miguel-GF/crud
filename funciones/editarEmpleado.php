<?php
	include("conexion.php");
	$name=$_POST['v1'];
    $age=$_POST['v2'];
 	$address=$_POST['v3'];
 	$phone=$_POST['v4'];
    $puesto=$_POST['v5'];
 	$salary=$_POST['v6'];
    $id=$_POST['v7'];
    $id_Len=$_POST['v8'];
    $porc=$_POST['v9'];
 	////EDITARR INF. PERSONAL////
 	if(mysqli_query($link, "UPDATE tbl_empleado SET nombre='$name', edad='$age', direccion='$address', telefono='$phone' WHERE id='$id'")){
 		//echo "<script>M.toast({html: 'Empleado Agregado Correctamente'})</script>";
    }
    else{
    	echo "<script>M.toast({html: 'No se pudo Actualizar Información Personal del Empleado'})</script>";
    	 die("Connection failed: " . mysqli_connect_error());
    }
    ///EDITAR DATOS ECONOMICOS///
    if(mysqli_query($link, "UPDATE tbl_datos_economicos SET puesto='$puesto', salario='$salary' WHERE tbl_empleado_id='$id' ")) {
 		//echo "<script>M.toast({html: 'Empleado Agregado Correctamente'})</script>";
    }
    else{
	   	echo "<script>M.toast({html: 'No se pudo Actualizar Datos Económicos'})</script>";
	   	 die("Connection failed: " . mysqli_connect_error());
    }
    ///EDITAR CONOCIMIENTOS///
    if(mysqli_query($link, "UPDATE tbl_conocimientos SET porcentaje='$porc', tbl_lenguajes_id='$id_Len' WHERE tbl_empleado_id='$id' ")) {
        //echo "<script>M.toast({html: 'Empleado Agregado Correctamente'})</script>";
    }
    else{
        echo "<script>M.toast({html: 'No se pudo Actualizar Conocimientos'})</script>";
         die("Connection failed: " . mysqli_connect_error());
    }

    echo "<script>M.toast({html: 'Empleado Actualizado Correctamente'})</script>";
    mysqli_close($link);
?>