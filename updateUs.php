<?php
include ("conn.php");
include ("header.php");
include ("nav_sesionAdmin.php");
include ("footer.php");
try {
	if(
		!isset($_POST["nombreEmpleado"]) || 
		!isset($_POST["apellidoPaternoEmpleado"]) || 
		!isset($_POST["apellidoMaternoEmpleado"]) || 
		!isset($_POST["numeroEmpleado"]) || 
		!isset($_POST["userEmpleado"]) || 
		!isset($_POST["passEmpleado"]) || 
		!isset($_POST["idPuestoEmpleado"]) || 
		!isset($_POST["idArea"]) || 
		!isset($_POST["idTipoEmpleado"]) || 
		!isset($_POST["idEmpleado"])
	) exit();
	$nombreEmpleado = $_POST['nombreEmpleado'];
	$apellidoPaternoEmpleado = $_POST['apellidoPaternoEmpleado'];
	$apellidoMaternoEmpleado = $_POST['apellidoMaternoEmpleado'];
	$numeroEmpleado = $_POST['numeroEmpleado'];
	$userEmpleado = $_POST['userEmpleado'];
	$passEmpleado = $_POST['passEmpleado'];
	$idPuestoEmpleado = $_POST['idPuestoEmpleado'];
	$idArea = $_POST['idArea'];
	$idTipoEmpleado = $_POST['idTipoEmpleado'];
	$idEmpleado = $_POST['idEmpleado'];
	$stmt = $conn->prepare("UPDATE empleados SET nombreEmpleado = ?, apellidoPaternoEmpleado = ?, apellidoMaternoEmpleado = ?, numeroEmpleado = ?, userEmpleado = ?, passEmpleado = ?, idPuestoEmpleado = ?, idArea = ?, idTipoEmpleado = ?  WHERE idEmpleado = ?;");
	$result = $stmt->execute([$nombreEmpleado, $apellidoPaternoEmpleado, $apellidoMaternoEmpleado,  $numeroEmpleado, $userEmpleado, $passEmpleado, $idPuestoEmpleado, $idArea, $idTipoEmpleado, $idEmpleado]);
	if($result===true){
		echo "<script> alert('Actualizado Correctamente');
		location.href = 'consultarUs.php';
		</script>";
	}
	else{
		echo "<script> alert('Error al Actualizar');
		location.href = 'consultarUs.php';
		</script>";
	}
} catch(PDOException $e) {
    echo "Error" .$e->getMessage();
}
?>
