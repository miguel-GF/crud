<?php
	include("conexion.php");
	$lenguaje=$_POST['v1'];
 	////ALTA NUEVO LENGUAJE////
 	if(mysqli_query($link, "INSERT INTO tbl_lenguajes(lenguaje) VALUES('$lenguaje')")){
 		//echo "<script>M.toast({html: 'Empleado Agregado Correctamente'})</script>";
    }
    else{
    	echo "<script>M.toast({html: 'No se pudo Agregar Nuevo Lenguaje'})</script>";
    	 die("Connection failed: " . mysqli_connect_error());
    }
    
    echo "<script>M.toast({html: 'Lenguaje Agregado Correctamente'})</script>";
    mysqli_close($link);
?>