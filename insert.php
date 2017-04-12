<?php
	print("select"); 
	$servername = "us-cdbr-iron-east-03.cleardb.net";
	$username = "bfd1849f40443a";
	$password = "fcae7675";
	$dbname = "ad_7c1f0caae9b13ee";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		print($conn) ; 
		die("Connection failed: " . $conn->connect_error);
	}

	$clave = $_POST["clave"];
	$nombre = $_POST["nombre"];
	$direccion = $_POST["direccion"];
	$telefono = $_POST["telefono"];
	$correo = $_POST["correo"];



	// prepare and bind
	$stmt = $conn->prepare("INSERT INTO diccionario (clave, nombre, correo, direccion, telefono) VALUES (?, ?, ?, ?, ?)");
	$stmt->bind_param("issss", $clave, $nombre, $direccion, $telefono, $correo);

	// set parameters and execute
	
	$stmt->execute();

	echo "successfully";

	$stmt->close();
	$conn->close();
?>