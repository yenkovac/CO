<?php
include ("conn.php");
try {
	if(
		!isset($_POST["folioOficio"]) || 
		!isset($_POST["fechaOficio"]) || 
		!isset($_POST["fechaIngresoOficio"]) || 
		!isset($_POST["fechaRegistroOficio"]) || 
		!isset($_POST["folioOficioExterno"]) || 
		!isset($_POST["asuntoOficio"]) || 
		!isset($_POST["nombreEmpresa"]) || 
		!isset($_POST["nombrePromovente"]) || 
		!isset($_POST["apellidoPaternoPromovente"]) || 
		!isset($_POST["apellidoMaternoPromovente"]) || 
		!isset($_POST["anexoOficio"]) || 
		!isset($_POST["idTipoDocumento"]) || 
		!isset($_POST["idTipoPromovente"]) || 
		!isset($_POST["idEmpleado"]) || 
		!isset($_POST["idArea"]) || 
		!isset($_POST["idEstatus"]) || 
		!isset($_POST["idOficio"])
	) exit();
	$folioOficio = $_POST['folioOficio'];
	$fechaOficio = $_POST['fechaOficio'];
	$fechaIngresoOficio = $_POST['fechaIngresoOficio'];
	$fechaRegistroOficio = $_POST['fechaRegistroOficio'];
	$folioOficioExterno = $_POST['folioOficioExterno'];
	$asuntoOficio = $_POST['asuntoOficio'];
	$nombreEmpresa = $_POST['nombreEmpresa'];
	$nombrePromovente = $_POST['nombrePromovente'];
	$apellidoPaternoPromovente = $_POST['apellidoPaternoPromovente'];
	$apellidoMaternoPromovente = $_POST['apellidoMaternoPromovente'];
	$anexoOficio = $_POST['anexoOficio'];
	$idTipoDocumento = $_POST['idTipoDocumento'];
	$idTipoPromovente = $_POST['idTipoPromovente'];
	$idEmpleado = $_POST['idEmpleado'];
	$idArea = $_POST['idArea'];
	$idEstatus = $_POST['idEstatus'];
	$idOficio = $_POST['idOficio'];
	$query = "SELECT * FROM oficio WHERE folioOficio = :folioOficio";
	$consult = $conn->prepare($query);
	$consult->bindParam(":folioOficio", $folioOficio);
	$consult->execute();
	$stmt = $conn->prepare("UPDATE oficio SET folioOficio = ?, fechaOficio = ?, fechaIngresoOficio = ?, fechaRegistroOficio = ?, folioOficioExterno = ?, asuntoOficio = ?, nombreEmpresa = ?, nombrePromovente = ?, apellidoPaternoPromovente = ?, apellidoMaternoPromovente = ?, anexoOficio = ?, idTipoDocumento = ?, idTipoPromovente = ?, idEmpleado = ?, idArea = ?, idEstatus = ?  WHERE idOficio = ?;");
	$result = $stmt->execute([$folioOficio, $fechaOficio, $fechaIngresoOficio, $fechaRegistroOficio, $folioOficioExterno, $asuntoOficio, $nombreEmpresa, $nombrePromovente, $apellidoPaternoPromovente, $apellidoMaternoEmpleado,  $anexoOficio, $idTipoDocumento, $idTipoPromovente, $idEmpleado, $idArea, $idEstatus, $idOficio]);
	if($result===true){
		echo "<script> alert('Actualizado Correctamente');
		location.href = 'consultarOficio.php';
		</script>";
	}
	else{
		echo "<script> alert('Error al Actualizar');
		location.href = 'consultarOficio.php';
		</script>";
	}
}catch(PDOException $e) {
    echo "Error" .$e->getMessage();
}
?>
