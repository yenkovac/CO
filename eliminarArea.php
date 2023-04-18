<?php
include ("conn.php");
include ("header.php");
include ("nav_sesionAdmin.php");
include ("footer.php");
?>
<?php
try {
	if(!isset($_GET["idArea"])) exit();
	$idArea = $_GET["idArea"];
	$stmt = $conn->prepare("DELETE FROM area WHERE idArea = ?;");
	$result = $stmt->execute([$idArea]);
	if($result === TRUE){
		echo "<script> alert('Registro Eliminado Correctamente');
			location.href = 'consultarArea.php';
			</script>";
	
	}else{
		echo "<script> alert('Error al Eliminar Registro');
		location.href = 'consultarArea.php';
		</script>";
	}
} catch(PDOException $e) {
    echo "Error" .$e->getMessage();
}
?>