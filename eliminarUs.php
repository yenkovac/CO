<?php
include ("conn.php");
include ("header.php");
include ("nav_sesionAdmin.php");
include ("footer.php");
?>
<?php
try {
	if(!isset($_GET["idEmpleado"])) exit();
	$idEmpleado = $_GET["idEmpleado"];
	$stmt = $conn->prepare("DELETE FROM empleados WHERE idEmpleado = ?;");
	$result = $stmt->execute([$idEmpleado]);
	if($result === TRUE){
		echo "<script> alert('Registro Eliminado Correctamente');
			location.href = 'consultarUs.php';
			</script>";
	
	}else{
		echo "<script> alert('Error al Eliminar Registro');
		location.href = 'consultarUs.php';
		</script>";
	}
} catch(PDOException $e) {
    echo "Error" .$e->getMessage();
}
?>