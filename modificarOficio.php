<?php
include ("conn.php");
include ("header.php");
include ("nav_sesionAdmin.php");
include ("footer.php");
?>
<?php
if(!isset($_GET["idOficio"])) exit();
$idOficio = $_GET["idOficio"];
$stmt = $conn->prepare("SELECT * FROM oficio WHERE idOficio = ?;");
$stmt->execute([$idOficio]);
$oficio = $stmt->fetch(PDO::FETCH_OBJ);
if($oficio === FALSE){
	echo "<script> alert('No Existe este Registro');
	location.href = 'consultarOficioSP.php';
	</script>";
	exit();
}
?>
<div class="container">
	<div class="card">
		<form action="updateOficio.php" method="post">
			<div align="center">
				<h1>Ingresa datos del oficio</h1>
			</div>
			<div class="form-group">
				<input name="idOficio" type="hidden" class="form-control is-valid" id="validation01" placeholder="Usuario" value="<?php echo $oficio->idOficio; ?>">
			</div>
			<div class="form-group">
				<label for="validation01">Folio</label>
				<input name="folioOficio" type="text" class="form-control is-valid" id="validation01" placeholder="Folio" pattern="[A-Za-z0-9/-]+" value="<?php echo $oficio->folioOficio; ?>" required>
			</div>
			<div class="form-group">
				<label for="validation02">Fecha del Documento</label>
				<input name="fechaOficio" type="date" class="form-control is-valid" id="validation02" placeholder="Fecha del Documento" value="<?php echo $oficio->fechaOficio; ?>" required>
			</div>
			<div class="form-group">
				<label for="validation03">Fecha de Ingreso</label>
				<input name="fechaIngresoOficio" type="date" class="form-control is-valid" id="validation03" placeholder="Fecha de Ingreso" value="<?php echo $oficio->fechaIngresoOficio; ?>" required>
			</div>
			<div class="form-group">
				<label for="validation04">Fecha Registro</label>
				<input name="fechaRegistroOficio" type="date" class="form-control is-valid" id="validation04" placeholder="Fecha Registro Oficio" value="<?php echo $oficio->fechaRegistroOficio; ?>" required>
			</div>
			<div class="form-group">
				<label for="validation05">Folio Externo</label>
				<input name="folioOficioExterno" type="text" class="form-control is-valid" id="validation05" placeholder="Folio Externo" pattern="[A-Za-z0-9/- x0Bf]+" value="<?php echo $oficio->folioOficioExterno; ?>" required>
			</div>
			<div class="form-group">
				<label for="validation06">Asunto</label>
				<input name="asuntoOficio" type="text" class="form-control is-valid" id="validation06" placeholder="Asunto" pattern="[A-Za-z x0Bf]+" value="<?php echo $oficio->asuntoOficio; ?>" required>
			</div>
			<div class="form-group">
				<label for="validation07">Nombre de la Empresa Promovente</label>
				<input name="nombreEmpresa" type="text" class="form-control is-valid" id="validation07" placeholder="Nombre de la Empresa Promovente" pattern="[A-Za-z x0Bf]+" value="<?php echo $oficio->nombreEmpresa; ?>" required>
			</div>
			<div class="form-group">
				<label for="validation08">Nombre del Promovente</label>
				<input name="nombrePromovente" type="text" class="form-control is-valid" id="validation08" placeholder="Nombre del Promovente" pattern="[A-Za-z x0Bf]+" value="<?php echo $oficio->nombrePromovente; ?>" required>
			</div>
			<div class="form-group">
				<label for="validation09">Apellido Paterno del Promovente</label>
				<input name="apellidoPaternoPromovente" type="text" class="form-control is-valid" id="validation09" placeholder="Apellido Paterno del Promovente" pattern="[A-Za-z x0Bf]+" value="<?php echo $oficio->apellidoPaternoPromovente; ?>" required>
			</div>
			<div class="form-group">
				<label for="validation10">Apellido Materno del Promovente</label>
				<input name="apellidoMaternoPromovente" type="text" class="form-control is-valid" id="validation10" placeholder="Apellido Materno del Promovente" pattern="[A-Za-z x0Bf]+" value="<?php echo $oficio->apellidoMaternoPromovente; ?>" required>
			</div>
			<div class="form-group">
				<label for="validation11">Anexos</label>
				<input name="anexoOficio" type="text" class="form-control is-valid" id="validation11" pattern="[A-Za-z x0Bf]+" placeholder="Anexos" value="<?php echo $oficio->anexoOficio; ?>" required>
			</div>
			<div class="form-group">
			<?php
				$query = "SELECT * FROM tipodocumento";
				$stmt = $conn->prepare($query);
				$stmt->execute();
				$result = $stmt->fetchAll();
				foreach ($result as $row) {
				}
				?>
				<label for="validation12">Tipo de Documento</label>
				<select name="idTipoDocumento" id="validation12" class="form-control">
					<option value="">Selecciona</option>
					<?php foreach ($result as $value) : ?>
						<option value="<?php echo $value->idTipoDocumento ?>"><?php echo $value->idTipoDocumento ?> <?php echo $value->tipoDocumento ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<?php
				$query = "SELECT * FROM tipopromovente";
				$stmt = $conn->prepare($query);
				$stmt->execute();
				$result = $stmt->fetchAll();
				foreach ($result as $row) {
				}
				?>
				<label for="validation13">Tipo Promovente</label>
				<select name="idTipoPromovente" id="validation13" class="form-control">
					<option value="">Selecciona</option>
					<?php foreach ($result as $value) : ?>
						<option value="<?php echo $value->idTipoPromovente ?>"><?php echo $value->idTipoPromovente ?> <?php echo $value->tipoPromovente ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<?php
				$query = "SELECT * FROM empleados";
				$stmt = $conn->prepare($query);
				$stmt->execute();
				$result = $stmt->fetchAll();
				foreach ($result as $row) {
				}
				?>
				<label for="validation15">Empleado que Capturo</label>
				<select name="idEmpleado" id="validation15" class="form-control">
					<option value="">Selecciona</option>
					<?php foreach ($result as $value) : ?>
						<option value="<?php echo $value->idEmpleado ?>"><?php echo $value->idEmpleado ?> <?php echo $value->nombreEmpleado ?> <?php echo $value->apellidoPaternoEmpleado ?> <?php echo $value->apellidoMaternoEmpleado ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<?php
				$query = "SELECT * FROM area";
				$stmt = $conn->prepare($query);
				$stmt->execute();
				$result = $stmt->fetchAll();
				foreach ($result as $row) {
				}
				?>
				<label for="validation15">Área a Turnar</label>
				<select name="idArea" id="validation15" class="form-control">
					<option value="">Selecciona</option>
					<?php foreach ($result as $value) : ?>
						<option value="<?php echo $value->idArea ?>"><?php echo $value->idArea ?> <?php echo $value->nombreArea ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<?php
				$query = "SELECT * FROM estatus";
				$stmt = $conn->prepare($query);
				$stmt->execute();
				$result = $stmt->fetchAll();
				foreach ($result as $row) {
				}
				?>
				<label for="validation16">Estatus</label>
				<select name="idEstatus" id="validation16" class="form-control">
					<option value="">Selecciona</option>
					<?php foreach ($result as $value) : ?>
						<option value="<?php echo $value->idEstatus ?>"><?php echo $value->idEstatus ?> <?php echo $value->tipoEstatus ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<div class="col-sm-12" align="right">
					<br>
					<button name="btnEnviar" type="submit" class="btn">Enviar</button>
				</div>
			</div>
		</form>
	</div>
</div>