<?php
include ("conn.php");
	define('CLAVE', '6LeSxoYlAAAAAN4tegWNBbwSL1sAXoSk2h4lNK8O');
	
	$token = $_POST['token'];
	$action = $_POST['action'];
	
	$cu = curl_init();
	curl_setopt($cu, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
	curl_setopt($cu, CURLOPT_POST, 1);
	curl_setopt($cu, CURLOPT_POSTFIELDS, http_build_query(array('secret' => CLAVE, 'response' => $token)));
	curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($cu);
	curl_close($cu);
	
	$datos = json_decode($response, true);
	
	print_r($datos);
	
	if($datos['success'] == 1 && $datos['score'] >= 0.5){
		if($datos['action'] == 'validarUsuario'){
			try {
                $userEmpleado = $_POST['userEmpleado'];
    $passEmpleado = $_POST['passEmpleado'];
	if ($conn != null) {
		$query = "SELECT * FROM empleados WHERE userEmpleado = :userEmpleado AND passEmpleado = :passEmpleado";
		$stmt = $conn->prepare($query);
		$stmt->bindParam(':userEmpleado',$userEmpleado);
		$stmt->bindParam(':passEmpleado',$passEmpleado);
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute();
		$datos = $stmt->fetch();
		if ($datos['userEmpleado']!=null) {
			session_start();
			$_SESSION["nombreEmpleado"]=$datos["nombreEmpleado"];
			$_SESSION["apellidoPaternoEmpleado"]=$datos["apellidoPaternoEmpleado"];
			$_SESSION["apellidoMaternoEmpleado"]=$datos["apellidoMaternoEmpleado"];
			$_SESSION["numeroEmpleadouserEmpleado"]=$datos["numeroEmpleadouserEmpleado"];
			$_SESSION["userEmpleado"]=$datos["userEmpleado"];
			$_SESSION["tipoEmpleado"]=$datos["passEmpleado"];
			$_SESSION["idPuestoEmpleado"]=$datos["idPuestoEmpleado"];
			$_SESSION["idArea"]=$datos["idArea"];
			$_SESSION["idTipoEmpleado"]=$datos["idTipoEmpleado"];
			if ($_SESSION["idTipoEmpleado"]=="1") {
				$_SESSION["User"]="A";
				echo "<script> alert('Login Exitoso');
				location.href = 'inicio.php';
				</script>";
			}else{
				$_SESSION["User"]="SP";
				echo "<script> alert('Login Exitoso');
				location.href = 'home.php';
				</script>";
			}
		}else{
			echo "<script> alert('Datos incorrectos');
			location.href = 'login.php';
			</script>";
			exit();
		}
		$conn = null;
	}else{
		echo "<script> alert('No hay conexion a base de datos');
		location.href = 'login.php';
		</script>";
	}
}catch(PDOException $e) {
        echo "Error" .$e->getMessage();
    }
		}
		
		} else {
		echo "ERES UN ROBOT";
	}
?>