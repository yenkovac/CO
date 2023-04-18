<?php
include ("conn.php");
include ("header.php");
include ("nav_sesionAdmin.php");
include ("footer.php");
?>
<?php
try {
	if(!isset($_GET["idOficio"])) exit();
	$idOficio = $_GET["idOficio"];
	$stmt = $conn->prepare("DELETE FROM oficio WHERE idOficio = ?;");
	$result = $stmt->execute([$idOficio]);
	if($result === TRUE){
		echo "<script> alert('Registro Eliminado Correctamente');
			location.href = 'consultarOficio.php';
			</script>";
	
	}else{
		echo "<script> alert('Error al Eliminar Registro');
		location.href = 'consultarOficio.php';
		</script>";
	}
} catch(PDOException $e) {
    echo "Error" .$e->getMessage();
}
?>