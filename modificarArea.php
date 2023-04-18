<?php
include ("conn.php");
include ("header.php");
include ("nav_sesionAdmin.php");
include ("footer.php");
?>
<?php
if(!isset($_GET["idArea"])) exit();
$idArea = $_GET["idArea"];
$stmt = $conn->prepare("SELECT * FROM area WHERE idArea = ?;");
$stmt->execute([$idArea]);
$areas = $stmt->fetch(PDO::FETCH_OBJ);
if($areas === FALSE){
	echo "<script> alert('No Existe este Registro');
	location.href = 'consultarArea.php';
	</script>";
	exit();
}
?>
<div class="container">
	<div class="card">
		<form action="updateArea.php" method="post">
			<div align="center">
				<h1>Ingresa los datos del área</h1>
			</div>
			<div class="form-group">
				<input name="idArea" type="hidden" class="form-control is-valid" id="validation01" placeholder="Usuario" pattern="[A-Za-z x0Bf]+" value="<?php echo $areas->idArea; ?>">
			</div>
			<div class="form-group">
				<label for="validation02">Nombre del Área</label>
				<input name="nombreArea" type="text" class="form-control is-valid" id="validation02" placeholder="Nombre del Área" pattern="[A-Za-z x0Bf]+" value="<?php echo $areas->nombreArea; ?>" required>
			</div>
			<div class="form-group">
				<label for="validation03">Nombre del Titular</label>
				<input name="nombreTitular" type="text" class="form-control is-valid" id="validation03" placeholder="Nombre de Titular" pattern="[A-Za-z x0Bf]+" value="<?php echo $areas->nombreTitular; ?>" required>
			</div>
			<div class="form-group">
				<label for="validation04">Apellido Paterno del Titular</label>
				<input name="apellidoPaternoTitular" type="text" class="form-control is-valid" id="validation04" placeholder="Apellido Paterno del Titular" pattern="[A-Za-z x0Bf]+" value="<?php echo $areas->apellidoPaternoTitular; ?>" required>
			</div>
			<div class="form-group">
				<label for="validation05">Apellido Materno del Titular</label>
				<input name="apellidoMaternoTitular" type="text" class="form-control is-valid" id="validation05" placeholder="Apellido Materno del Titular" pattern="[A-Za-z x0Bf]+" value="<?php echo $areas->apellidoMaternoTitular; ?>" required>
			</div>
			<div class="form-group">
				<div class="col-sm-12" align="right">
					<button name="btnEnviar" type="submit" class="btn">Enviar</button>
				</div>
			</div>
		</form>
	</div>
</div>