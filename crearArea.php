<?php
include ("conn.php");
include ("header.php");
include ("nav_sesionAdmin.php");
?>
<div class="container">
	<div class="card">
		<form action="crearArea.php" method="post">
			<div align="center">
				<h1>Ingresa los datos del área</h1>
			</div>
			<div class="form-group">
				<label for="validation01">Nombre del Área</label>
				<input name="nombreArea" type="text" class="form-control is-valid" id="validation01" placeholder="Nombre del Área" value="" required pattern="[A-Za-z x0Bf]+">
			</div>
			<div class="form-group">
				<label for="validation02">Nombre del Titular</label>
				<input name="nombreTitular" type="text" class="form-control is-valid" id="validation02" placeholder="Nombre del Titular" value="" required pattern="[A-Za-z x0Bf]+">
			</div>
			<div class="form-group">
				<label for="validation03">Apellido Paterno del Titular</label>
				<input name="apellidoPaternoTitular" type="text" class="form-control is-valid" id="validation03" placeholder="Apellido Paterno del Titular" value="" required pattern="[A-Za-z x0Bf]+">
			</div>
			<div class="form-group">
				<label for="validation04">Apellido Materno del Titular</label>
				<input name="apellidoMaternoTitular" type="text" class="form-control is-valid" id="validation04" placeholder="Apellido Materno del Titular" value="" required pattern="[A-Za-z x0Bf]+">
			</div>
			
			<div class="form-group">
				<div class="col-sm-12" align="right">
					<br>
					<button onclick="location.href='inicio.php'" name="btnCancelar" type="submit" class="btn">Cancelar</button>
					<button name="btnEnviar" type="submit" class="btn">Enviar</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php
try {
	if(isset($_POST["btnEnviar"])){
		$idArea;
		$nombreArea = $_POST['nombreArea'];
		$nombreTitular = $_POST['nombreTitular'];
		$apellidoPaternoTitular = $_POST['apellidoPaternoTitular'];
		$apellidoMaternoTitular = $_POST['apellidoMaternoTitular'];
		if ($conn != null) {
			$query = "INSERT INTO area (idArea, nombreArea, nombreTitular, apellidoPaternoTitular, apellidoMaternoTitular) VALUES (?, ?, ?, ?, ?)";
			$stmt = $conn->prepare($query);
			$stmt->bindParam(1,$idArea);
			$stmt->bindParam(2,$nombreArea);
			$stmt->bindParam(3,$nombreTitular);
			$stmt->bindParam(4,$apellidoPaternoTitular);
			$stmt->bindParam(5,$apellidoMaternoTitular);
			$stmt->execute();
			//$conn = null;
			if($stmt){
				echo "<script> alert('Registrado correctamente');
				location.href = 'inicio.php';
				</script>";
			}else{
				echo "<script> alert('Error al registrar');
				location.href = 'crearArea.php';
				</script>";
			}
		}else{
			echo "<script> alert('No hay conexion a base de datos');
			location.href = 'crearArea.php';
			</script>";
		}
	}
} catch(PDOException $e) {
    echo "Error" .$e->getMessage();
}
?>
<?php
include ("footer.php");
?>