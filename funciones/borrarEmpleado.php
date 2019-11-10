<?php
	include("conexion.php");
	$id=$_POST['v1'];
    ///BORRAR DATOS ECONOMICOS///
    if(mysqli_query($link, "DELETE FROM tbl_datos_economicos WHERE tbl_empleado_id='$id' ")) {
 		//echo "<script>M.toast({html: 'Empleado Agregado Correctamente'})</script>";
    }
    else {
	   	echo "<script>M.toast({html: 'No se pudo Eliminar Datos Económicos'})</script>";
	   	 die("Connection failed: " . mysqli_connect_error());
    }
    ///BORRAR CONOCIMIENTOS///
    if(mysqli_query($link, "DELETE FROM tbl_conocimientos WHERE tbl_empleado_id='$id' ")) {
 		//echo "<script>M.toast({html: 'Empleado Agregado Correctamente'})</script>";
    }
    else {
	   	echo "<script>M.toast({html: 'No se pudo Eliminar Conocimientos'})</script>";
	   	 die("Connection failed: " . mysqli_connect_error());
    }
    ////BORRAR EMPLEADO////
    if(mysqli_query($link, "DELETE FROM tbl_empleado WHERE id='$id'")) {
        //echo "<script>M.toast({html: 'Empleado Agregado Correctamente'})</script>";
    }
    else {
        echo "<script>M.toast({html: 'No se pudo Eliminar al Empleado'})</script>";
         die("Connection failed: " . mysqli_connect_error());
    }
    echo "<script>M.toast({html: 'Empleado Borrado Correctamente'})</script>";
    mysqli_close($link);

?>