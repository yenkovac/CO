<?php
include ("conn.php");
include ("header.php");
include ("nav_sesion1Admin.php");
include ("footer.php");
try {
	if(
		!isset($_POST["nombreArea"]) || 
		!isset($_POST["nombreTitular"]) || 
		!isset($_POST["apellidoPaternoTitular"]) || 
		!isset($_POST["apellidoMaternoTitular"]) || 
		!isset($_POST["idArea"])
	) exit();
	$nombreArea = $_POST['nombreArea'];
	$nombreTitular = $_POST['nombreTitular'];
	$apellidoPaternoTitular = $_POST['apellidoPaternoTitular'];
	$apellidoMaternoTitular = $_POST['apellidoMaternoTitular'];
	$idArea = $_POST['idArea'];
	$stmt = $conn->prepare("UPDATE area SET nombreArea = ?, nombreTitular = ?, apellidoPaternoTitular = ?, apellidoMaternoTitular = ?  WHERE idArea = ?;");
	$result = $stmt->execute([$nombreArea, $nombreTitular, $apellidoPaternoTitular,  $apellidoMaternoTitular, $idArea]);
	if($result===true)
	{
		echo "<script> alert('Actualizado Correctamente');
		location.href = 'consultarArea.php';
		</script>";
	}
	else{
		echo "<script> alert('Error al Actualizar');
		location.href = 'consultarArea.php';
		</script>";
	}
} catch(PDOException $e) {
    echo "Error" .$e->getMessage();
}
?>
