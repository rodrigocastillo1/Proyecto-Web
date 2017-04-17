<?php
	include("./conexion.php");
	require("./conexion.php");

	if(!$conn)
		echo "No se pudo establecer conexion"."<br>";

	$email = $_POST["email"];
	$password = $_POST["password"];

	if(filter_var($email, FILTER_VALIDATE_EMAIL)){
		$confirma_cuenta = mysqli_query($conn, "SELECT * FROM usuario WHERE email = '$email' && password = '$password'");
		if(mysqli_num_rows($confirma_cuenta) > 0){
			session_start();
			$_SESSION['email'] = $email;
			mysqli_close($conn);
			header('Location: tienda.html');
			exit(0);
		}
		else{
			mysqli_close($conn);
			echo '<script language="javascript">alert("El usuario no está registrado");</script>';
			header('Location: ../index.html');
			exit(0);
		}
	}
?>