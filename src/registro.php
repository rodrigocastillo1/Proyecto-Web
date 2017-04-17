<?php
	include("./conexion.php");
	require("./conexion.php");

	if(!$conn)
		echo "No se pudo establecer conexion"."<br>";

	$nombre = $_POST["first_name"];
	$apellido_pat = $_POST["pat_last_name"];
	$apellido_mat = $_POST["mat_last_name"];
	$edad = $_POST["age"];
	$email = $_POST["email"];
	$password1 = $_POST["password1"];
	$password2 = $_POST["password2"];

	if(!isset($_POST["isManager"]))
		$isManager = 0;
	else
		$isManager = 1;

	if(filter_var($email, FILTER_VALIDATE_EMAIL)){
		$confirma_email = mysqli_query($conn, "SELECT email FROM usuario WHERE email = '$email'");
		if(mysqli_num_rows($confirma_email) > 0){
			mysqli_close($conn);
			echo '<script language="javascript">alert("El usuario ya está registrado");</script>';
			$registro = file_get_contents("registro.html");
			echo $registro;
			exit(0);
		}
		if($password1 != $password2){
			mysqli_close($conn);
			echo '<script language="javascript">alert("Las contraseñas no coinciden");</script>';
			$registro = file_get_contents("registro.html");
			echo $registro;
			exit(0);
		}
		else{
			$inserta_nuevo_usuario = mysqli_query($conn, "INSERT INTO usuario (`email`, `password`, `name`, `pat_last_name`, `mat_last_name`, `age`, `isManager`) VALUES ('$email', '$password1', '$nombre', '$apellido_pat', '$apellido_mat', '$edad', '$isManager')");
			if($inserta_nuevo_usuario == false)
				echo "Error al insertar"."<br>";
			mysqli_close($conn);
			echo '<script language="javascript">alert("Usuario correctamente registrado");</script>';
			header('Location: ../index.html');
			exit(0);
		}
	}

?>