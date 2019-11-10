<?php
	include("conexion.php");
	//SELECT tbl_empleado.id,nombre, direccion, telefono, puesto, lenguaje, porcentaje FROM tbl_empleado, tbl_datos_economicos, tbl_conocimientos, tbl_lenguajes WHERE tbl_empleado.id=tbl_datos_economicos.tbl_empleado_id AND tbl_empleado.id=tbl_conocimientos.tbl_empleado_id AND tbl_conocimientos.tbl_lenguajes_id=tbl_lenguajes.id
	$sql = "SELECT id, nombre, edad, direccion, estado, fecha_nacimiento, telefono FROM tbl_empleado WHERE id = ?";

	$stmt = $link->prepare($sql);
	$stmt->bind_param("s", $_GET['q']);
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($id, $name, $age, $adr, $status, $birth, $phone);
	$stmt->fetch();
	$stmt->close();

	echo "<table class='striped responsive-table'>";
	echo "<tr>";
	echo "<th>Nombre</th>";
	echo "<th>Edad</th>";
	echo "<th>Dirección</th>";
	echo "<th>Estado</th>";
	echo "<th>Fecha_Nacimiento</th>";
	echo "<th>Teléfono</th>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td>" . $name . "</td>";
	echo "<td>" . $age . "</td>";
	echo "<td>" . $adr . "</td>";
	echo "<td>" . $status . "</td>";
	echo "<td>" . $birth . "</td>";
	echo "<td>" . $phone . "</td>";
	echo "</tr>";
	echo "</table>";
?> 